<?php

namespace Golovchanskiy\LaravelGoodLogViewer\Console\Commands;

use Golovchanskiy\LaravelGoodLogViewer\GoodLogViewerServiceProvider;

class PublishCommand extends Command
{

    protected $name = 'good-log-viewer:publish';

    protected $description = 'Publish all LaravelGoodLogViewer resources and config files';

    protected $signature = 'good-log-viewer:publish
            {--tag= : One or many tags that have assets you want to publish.}
            {--force : Overwrite any existing files.}';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $args = [
            '--provider' => GoodLogViewerServiceProvider::class,
        ];

        if ((bool)$this->option('force')) {
            $args['--force'] = true;
        }

        $args['--tag'] = [$this->option('tag')];

        $this->displayLogViewer();
        $this->call('vendor:publish', $args);
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['tag', 't', InputOption::VALUE_OPTIONAL, 'One or many tags that have assets you want to publish.', ''],
            ['force', 'f', InputOption::VALUE_OPTIONAL, 'Overwrite any existing files.', false],
        ];
    }
}
