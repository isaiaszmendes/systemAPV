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
         
                // Gate::define('pendecias', function ($user) {

                //     if(
                //         (!$user->endereco) ||
                //         (!$user->telefone)
                //     ){
                //         return $user;
                //     }
                // });

                // $user = auth()->user();
                
                // # Count das Pendencias
                // $count =  $user->chamado ? 0 : 1;
                // $count += $user->chamado ? 0 : 1;

                // Gate::define('crud_all', function ($user) {

                //     if(
                //         (!$user->chamado) ||
                //         (!$user->chamado)
                //     ){
                //         return $user;
                //     }
                // });



                $event->menu->add('Menu');
                $event->menu->add(
                    [
                        'text'  =>  'Home',
                        'url'   =>  'home',
                        'icon'  =>  'home',
                        
                    ],
                    [
                        'text'          =>  'Pendências',
                        'icon_color'    =>  'red',
                        'url'           =>  "route('pendecias')",
                        'label'         =>  '2',
                        'label_color'   =>  'danger',
                        'can'           =>  'pendecias'
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
                    , [
                        'text'      =>  'Ajuda', 
                        'url'       =>  'usuarios',                   
                        'icon'      =>  'question',
                        'can'       =>  'request_called',
                    ]

                );
            // }
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
