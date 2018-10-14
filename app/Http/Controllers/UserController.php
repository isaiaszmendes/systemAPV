<?php

namespace systemAPV\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use systemAPV\Models\User;
use systemAPV\Models\Role;
use systemAPV\Models\RoleUser;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'/*, */]);
    }

    public function index(){

        // $roles = Role::all();
        $users = User::where('id', '!=', Auth::id())->orderBy('name')->paginate(5);
        
        return view('administrador.usuarios', compact('users'));

    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'name'      =>  'required',
            'email'     =>  'required|unique:users',
            'role'      =>  'nullable'         
        ]);
         
        $user = User::create([
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'password'  =>  bcrypt('sistema@2018'),
        ]);

        $user->roles->create();
        
        return redirect()->route('users')
            ->with('flash_message', 'Usuário adicionado com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $this->validate($request, [
            'name'      =>  'required',
            'email'     =>  'required',
            // 'role'      =>  ''            
        ]);

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

}
