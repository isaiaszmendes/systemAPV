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
            // Gate::define('pendecias', function ($user) {

            //     if(
            //         dd(!$user->mesa)
            //         (!$user->mesa->user) 
            //     ){
            //         return $user;
            //     }
            // });
            $event->menu->add(
                [
                    'text'      =>  'Mesas',                             
                    'icon'      =>  '',
                    'can'       =>  'view_requerentes',
                    'submenu'   =>  [
                        [
                            'text'      =>  'Sem Cliente a mesa', 
                            'url'       =>  route('mesas.semCliente'),                   
                            'can'       =>  'view_requerentes',
                        ],
                        [
                            'text'      =>  'Em Atendimento', 
                            'url'       =>  route('mesas.mesasEmAtendimento'),                  
                            'can'       =>  'view_requerentes',
                        ],  
                        [
                            'text'      =>  'Precisando de ajuda', 
                            'url'       =>  route('mesas.necessitandoAjuda'),                   
                            'can'       =>  'view_requerentes',
                        ],                      
                        [
                            'text'      =>  'Recebendo ajuda ', 
                            'url'       =>  route('mesas.meuAtendimento'),                  
                            'can'       =>  'view_requerentes',
                        ],
                    ]

                ]


            );
        });
    }

    public function register()
    {
        
    }
}
