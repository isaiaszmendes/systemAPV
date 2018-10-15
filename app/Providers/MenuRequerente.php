<?php

namespace systemAPV\Providers;

use systemAPV\Models\Permission;
use systemAPV\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class MenuRequerente extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {        
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) { 
            $event->menu->add(
                [
                    'text'      =>  'Ajuda', 
                    'url'       =>  'ajuda',                   
                    'icon'      =>  'question-circle',
                    'can'       =>  'request_called',
                ]
            );
        });
    }

    public function register()
    {
        
    }
}
