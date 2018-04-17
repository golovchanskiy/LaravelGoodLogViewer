<?php

$prefix = config('good-log-viewer.routes.prefix');
Route::group(['namespace' => '\Golovchanskiy\LaravelGoodLogViewer\Http\Controllers', 'as' => $prefix . '.', 'prefix' => $prefix], function () {
    Route::get('/', 'GoodLogViewerController@index');
});
