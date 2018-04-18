<?php

namespace Golovchanskiy\LaravelGoodLogViewer\Http\Controllers;

use Illuminate\Routing\Controller;

class GoodLogViewerController extends Controller
{
    protected $request;
    protected $theme;

    /**
     * GoodLogViewerController constructor.
     */
    public function __construct()
    {
        $this->request = app('request');
        $this->theme = config('good-log-viewer.theme');
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view("good-log-viewer::{$this->theme}.index", []);
    }
}