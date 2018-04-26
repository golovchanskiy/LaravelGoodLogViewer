<?php

namespace Golovchanskiy\LaravelGoodLogViewer;

use Illuminate\Support\Facades\Facade;

class GoodLogViewer extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'GoodLogViewer';
    }

}