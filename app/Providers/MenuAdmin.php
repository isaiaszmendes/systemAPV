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
            // # Menu para Pessoas Fisicas
            // if(auth()->guard('pessoaFisica')->user())
            // {              
            //     Gate::define('pendecias', function ($user) {

            //         if(
            //             (!$user->endereco) ||
            //             (!$user->telefone)
            //         ){
            //             return $user;
            //         }
            //     });

                // $pf = auth()->user();
                
                // # Count das Pendencias PF
                // $count =  $pf->telefone ? 0 : 1;
                // $count += $pf->endereco ? 0 : 1;


                $event->menu->add('Administrador');
                $event->menu->add(
                    [
                        'text'  =>  'Home',
                        'url'   =>  'home',
                        'icon'  =>  'home',
                    ],
                    [
                        'text'          =>  'Pendências',
                        'icon_color'    =>  'red',
                        'url'           =>  "route('pessoaFisica.pendecias')",
                        'label'         =>  '2',
                        'label_color'   =>  'danger',
                        'can'           =>  'pendecias'
                    ],
                    [
                        'text'      =>  'Usuários', 
                        'url'       =>  'usuarios',                   
                        'icon'      =>  'users',

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
