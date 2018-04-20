<?php

namespace Golovchanskiy\LaravelGoodLogViewer\Http\Controllers;

use Golovchanskiy\LaravelGoodLogViewer\Service\GoodLogViewerService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GoodLogViewerController extends Controller
{

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var string
     */
    protected $theme;

    /**
     * @var GoodLogViewerService
     */
    protected $service;

    /**
     * GoodLogViewerController constructor.
     *
     * @param GoodLogViewerService $service
     */
    public function __construct(GoodLogViewerService $service)
    {
        $this->request = app('request');
        $this->theme = config('good-log-viewer.theme');
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $pathList = $this->service->getPathList();
        $currentPath = $this->request->get('path', current($pathList));

        $fileList = $this->service->getFileList($currentPath);
        $currentFile = $this->request->get('file', current($fileList));

        return view("good-log-viewer::{$this->theme}.index", [
            'pathList' => $pathList,
            'currentPath' => $currentPath,
            'fileList' => $fileList,
            'currentFile' => $currentFile,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function data()
    {
        try {
            $file = $this->request->get('file');

            if (empty($file) || !file_exists($file)) {
                throw new \Exception(trans('good-log-viewer::errors.no-file', [
                    ':file' => $file,
                ]));
            }

            $data = $this->service->getLog($this->request->get('file'));
            return view("good-log-viewer::{$this->theme}._data", [
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return view("good-log-viewer::{$this->theme}._error", [
                'text' => $e->getMessage(),
            ]);
        }
    }
}