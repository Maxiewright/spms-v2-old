<?php

namespace Modules\Leave\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Modules\Leave\Http\Livewire\Adjustments\Adjustments;
use Modules\Leave\Http\Livewire\AllLeave;
use Modules\Leave\Http\Livewire\Entitlement\CreateEntitlement;
use Modules\Leave\Http\Livewire\Entitlement\MassCreateEntitlement;
use Modules\Leave\Http\Livewire\Entitlement\ShowEntitlement;
use Modules\Leave\Http\Livewire\Leave\CreateLeave;
use Modules\Leave\Http\Livewire\Reports\Current;
use Modules\Leave\Http\Livewire\Reports\Excessive;
use Modules\Leave\Http\Livewire\Reports\Pending;


class LeaveServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Leave';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'leave';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));

//        Leave
        Livewire::component('all-leave', AllLeave::class);
        Livewire::component('create-leave', CreateLeave::class);

//        Entitlement
        Livewire::component('entitlements', ShowEntitlement::class);
        Livewire::component('create-entitlement', CreateEntitlement::class);
        Livewire::component('mass-create-entitlement', MassCreateEntitlement::class);

//        Adjustments
        Livewire::component('adjustments', Adjustments::class);

//        Reports
        Livewire::component('excessive', Excessive::class);
        Livewire::component('current', Current::class);
        Livewire::component('pending', Pending::class);

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
