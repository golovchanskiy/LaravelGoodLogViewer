<?php

$prefix = config('good-log-viewer.routes.prefix');
Route::group([
    'namespace' => '\Golovchanskiy\LaravelGoodLogViewer\Http\Controllers',
    'as' => $prefix . '.',
    'prefix' => $prefix,
    'middleware' => config('good-log-viewer.routes.middleware'),
], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'GoodLogViewerController@index']);
    Route::get('data', ['as' => 'data', 'uses' => 'GoodLogViewerController@data']);
});
