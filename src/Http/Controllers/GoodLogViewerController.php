<?php

namespace Golovchanskiy\Http\Controllers;

use Illuminate\Routing\Controller;

class GoodLogViewerController extends Controller
{
    protected $request;

    /**
     * GoodLogViewerController constructor.
     */
    public function __construct()
    {
        $this->request = app('request');
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view('good-log-viewer::index', []);
    }
}