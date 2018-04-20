<?php

namespace Golovchanskiy\LaravelGoodLogViewer\Service;

class GoodLogViewerService
{

    /**
     * Max log file size
     *
     * @var integer
     */
    const MAX_SIZE = 52428800;

    /**
     * Log levels with bootstrap classes
     *
     * @var array
     */
    private static $levels = [
        'debug' => 'info',
        'info' => 'info',
        'notice' => 'info',
        'warning' => 'warning',
        'error' => 'danger',
        'critical' => 'danger',
        'alert' => 'danger',
        'emergency' => 'danger',
        'processed' => 'info',
        'failed' => 'warning',
    ];

    /**
     * Get log levels
     *
     * @return array
     */
    public function getLevels()
    {
        return array_keys(self::$levels);
    }

    /**
     * Get log level bootstrap classes
     *
     * @return array
     */
    public function getLevelClasses()
    {
        return self::$levels;
    }

    /**
     * Get log files path list
     *
     * @return array
     */
    public function getPathList()
    {
        $pathList = [];

        $items = config('good-log-viewer.paths');
        foreach ($items as $item) {
            $pathList[$item] = $item;
        }

        return $pathList;
    }

    /**
     * Get log files list
     *
     * @param null|array|string $paths - log file path list
     * @return array
     */
    public function getFileList($path)
    {
        $files = glob($path . '/' . config('good-log-viewer.pattern'));
        $files = array_reverse($files);
        $files = array_filter($files, 'is_file');

        $fileList = [];
        foreach ($files as $file) {
            $fileList[$file] = basename($file);
        }

        return $fileList;
    }

    /**
     * Get log
     *
     * @param string $filePath
     * @return array
     * @throws \Exception
     */
    public function getLog($filePath)
    {
        $pattern = '/\[\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}([\+-]\d{4})?\].*/';

        if (app('files')->size($filePath) > self::MAX_SIZE) {
            throw new \Exception(trans('good-log-viewer::errors.big-file', [
                'maxSize' => (int)(self::MAX_SIZE / 1024),
            ]));
        }

        $file = app('files')->get($filePath);

        preg_match_all($pattern, $file, $headings);

        if (!is_array($headings)) return [];

        $fileData = preg_split($pattern, $file);

        if ($fileData[0] < 1) {
            array_shift($fileData);
        }

        $data = [];
        foreach ($headings as $h) {
            for ($i = 0, $j = count($h); $i < $j; $i++) {
                foreach ($this->getLevels() as $level) {
                    if (strpos(strtolower($h[$i]), '.' . $level) || strpos(strtolower($h[$i]), $level . ':')) {

                        preg_match('/^\[(\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}([\+-]\d{4})?)\](?:.*?(\w+)\.|.*?)' . $level . ': (.*?)( in .*?:[0-9]+)?$/i', $h[$i], $current);
                        if (!isset($current[4])) continue;

                        $data[] = array(
                            'date' => $current[1],
                            'level' => $level,
                            'level_class' => self::$levels[$level] ?? 'default',
                            'context' => $current[3],
                            'text' => $current[4],
                            'file' => isset($current[5]) ? $current[5] : null,
                            'full_text' => preg_replace("/^\n*/", '', $fileData[$i])
                        );
                    }
                }
            }
        }

        return array_reverse($data);
    }

}