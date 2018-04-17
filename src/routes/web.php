<?php

$prefix = config('good-log-viewer.routes.prefix');
Route::group(['namespace' => 'Golovchanskiy\LaravelGoodLogViewer', 'as' => $prefix . '.', 'prefix' => $prefix], function () {
    Route::get('/', 'GoodLogViewerController@index');
});
