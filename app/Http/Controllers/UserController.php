<?php

namespace systemAPV\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use systemAPV\Models\User;
use systemAPV\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'/*, */]);
    }

    public function usuarios(){

        // $roles = Role::all();
        $users = User::where('id', '!=', Auth::id())->orderBy('name')->paginate(5);
        
        return view('administrador.usuarios', compact('users'));

    }

    public function create(Request $request)
    {
        // Role::findOrFail($request->role);

        $data = $this->validate($request, [
            'name'      =>  'required',
            'email'     =>  'required|unique:users',            
        ]);
        $data['password'] =  bcrypt('123@2018');

        User::create($data);
        
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

        $users = $user->search($dataForm)->orderBy('name')->paginate(5);

        if ($users) 
        {
            return view('administrador.usuarios', compact(['users', 'dataForm']));
        }else
        {   
            return view('administrador.usuarios', compact(['users', 'dataForm']));
        }
    }


}
