<?php

namespace Golovchanskiy\LaravelGoodLogViewer\Console\Commands;

use Illuminate\Console\Command as BaseCommand;

abstract class Command extends BaseCommand
{

    /**
     * Command constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display Logo and Copyrights
     */
    protected function displayLogViewer()
    {
        $this->comment("     .-. .-.        _____                 _   _                 ");
        $this->comment("    (   |   )      / ____|               | | | |                ");
        $this->comment("  .-.:  |  ;,-.   | |  __  ___   ___   __| | | |     ___   __ _ ");
        $this->comment(" (_ __`.|.'__ _)  | | |_ |/ _ \ / _ \ / _` | | |    / _ \ / _` |");
        $this->comment(" (    .'|`.    )  | |__| | (_) | (_) | (_| | | |___| (_) | (_| |");
        $this->comment("  `-'/  |  \`-'    \_____|\___/ \___/ \__,_| |______\___/ \__, |");
        $this->comment("    (   !   )                                              __/ |");
        $this->comment("     `-' `-'                                              |___/ ");
        $this->line("");

        $this->comment('Created by Anton Golovchanskiy');
        $this->line("");
    }
}
