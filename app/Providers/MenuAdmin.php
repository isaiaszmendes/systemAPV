<?php

namespace systemAPV\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class MenuAdmin extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $this->registerPolicies();

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {    

            $event->menu->add('Menu');
            $event->menu->add(
                [
                    'text'  =>  'Home',
                    'url'   =>  'home',
                    'icon'  =>  'home',
                    
                ],           
                [
                    'text'      =>  'Usuários', 
                    'url'       =>  'usuarios',                   
                    'icon'      =>  'users',
                    'can'       =>  'view_all',
                ],
                [
                    'text'      =>  'Gerênciar', 
                    'url'       =>  'usuarios',                   
                    'icon'      =>  'gears',
                    'can'       =>  'view_all',
                    'submenu'   =>  
                    [
                        [
                            'text'      =>  'Funções', 
                            'url'       =>  route('roles'), 
                            'icon'      =>  '',                  
                        ],
                        [
                            'text'      =>  'Permissões', 
                            'url'       =>  route('permissions'),  
                            'icon'      =>  '',                  
                        ]
                    ]
                ]
            );

        });
    }


    public function register()
    {
        //
    }
}
