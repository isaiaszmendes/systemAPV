<?php

namespace systemAPV\Providers;

use systemAPV\Models\Permission;
use systemAPV\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class MenuAtendente extends ServiceProvider
{

    public function boot(Dispatcher $events)
    {        
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) { 
            $event->menu->add(
                // [
                //     'text'      =>  'Mesas', 
                //     'url'       =>  'calls',                   
                //     'icon'      =>  '',
                //     'can'       =>  'view_requerentes',
                // ],
                [
                    'text'      =>  'Mesas Disponíveis', 
                    'url'       =>  route('atendente.mesas'),                   
                    'icon'      =>  '',
                    'can'       =>  'view_requerentes',
                ]
            );
        });
    }

    public function register()
    {
        
    }
}
