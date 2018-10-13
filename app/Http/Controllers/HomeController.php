<?php

namespace systemAPV\Http\Controllers;

use Illuminate\Http\Request;
use systemAPV\Models\Chamado;
use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Chamado $chamado)
    {
        $chamados = $chamado->all();
        return view('home', compact('chamados'));
    }

    public function update( $id)
    {
        $chamado = Chamado::find($id);

        // $this->authorize('chamado-update', $chamado);

        if (Gate::denies('chamado-update', $chamado))
            abort(403,'não pode');

        return view('chamado-update', compact('chamado'));
    }
}
