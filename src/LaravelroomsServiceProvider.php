<?php

namespace TheProfessor\Laravelrooms;

use Illuminate\Support\ServiceProvider;
use TheProfessor\Laravelrooms\Commands\LaravelroomsCommand;

class LaravelroomsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laravelrooms.php' => config_path('laravelrooms.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/laravelrooms'),
            ], 'views');

            $migrationFileName = 'create_laravelrooms_table.php';
            if (! $this->migrationFileExists($migrationFileName)) {
                $this->publishes([
                    __DIR__ . "/../database/migrations/{$migrationFileName}.stub" => database_path('migrations/' . date('Y_m_d_His', time()) . '_' . $migrationFileName),
                ], 'migrations');
            }

            $this->commands([
                LaravelroomsCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravelrooms');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravelrooms.php', 'laravelrooms');
    }

    public static function migrationFileExists(string $migrationFileName): bool
    {
        $len = strlen($migrationFileName);
        foreach (glob(database_path("migrations/*.php")) as $filename) {
            if ((substr($filename, -$len) === $migrationFileName)) {
                return true;
            }
        }

        return false;
    }
}
