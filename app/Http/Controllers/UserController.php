<?php

namespace systemAPV\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use systemAPV\Models\User;
use systemAPV\Models\Mesa;
use systemAPV\Models\Role;
use systemAPV\Models\RoleUser;
use Gate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'/*, */]);
    }

    public function index(){

        if(Gate::denies('view_all') && Gate::denies('accept_call')){
            return redirect()->back();
        }

        $users = User::where('id', '!=', Auth::id())->orderBy('name')->paginate(5);
        
        return view('administrador.usuarios', compact('users'));

    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'name'      =>  'required',
            'email'     =>  'required|unique:users',
            'role'      =>  'required'         
        ]);
         
        $user = User::create([
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'password'  =>  bcrypt('123456'),
        ]);

        RoleUser::create([
            'user_id' => $user->id,
            'role_id' => $request->role,
        ]);
        
        return redirect()->route('users')
            ->with('flash_message', 'Usuário adicionado com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $this->validate($request, [
            'name'      =>  'required',
            'email'     =>  'required',
            'role'      =>  'required'          
        ]);
        
        $user->roles()->sync($request->role);
        
        $user->update($data);

        return redirect()->route('users')
            ->with('flash_message', 'Usuário atualizado com sucesso!');

    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('users')
            ->with('flash_message', 'Usuário Excluído com Sucesso!');
    }


    public function search(Request $request, User $user)
    {
        $dataForm = $request->except('_token');

        $role = Role::find($request->role);

        if($role){
            $dataForm['role'] = $role->name;
        }

        $users = $user->search($dataForm)->orderBy('name')->paginate(5);

        return view('administrador.usuarios', compact(['users', 'dataForm']));
    
    }
    # requerente
    public function ajuda(){

        if(Gate::denies('request_called')){
            return redirect()->back();
        }

        $user = Auth::user();
        $mesa = Mesa::where('user_id', $user->id)->first();
        
        if($mesa){
           
            return view('requerente.ajuda', compact('mesa'));
        }
        return view('requerente.ajuda');
        
    }

    public function solicitar(){

        if(Gate::denies('request_called')){
            return redirect()->back();
        }
        
        $user = Auth::user();

        $mesa = Mesa::create([
            'user_id' => Auth::id(),
        ]);
                       
        return redirect()->back()
            ->with('flash_message', 'Você solicitou ajuda, aguarde um atendente!');
    }

    public function mesas(){

        return view('mesas.ajuda');
    }
    public function mesasDisponiveis(){

        if(Gate::denies('view_requerentes')){
            return redirect()->back();
        }

        $mesas = Mesa::all();
           
        return view('mesas.index', compact('mesas'));
    }
    

}
