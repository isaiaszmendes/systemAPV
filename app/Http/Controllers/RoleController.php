<?php

namespace systemAPV\Http\Controllers;

use Illuminate\Http\Request;
use systemAPV\Models\Role;
use systemAPV\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $roles = Role::all();

        return view('administrador.roles.index', compact('roles'));
    }

    public function permissions($id)
    {
        $role = Role::find($id);

        $permissions = $role->permissions;

        return view('administrador.roles.permissions', compact('role', 'permissions'));
    }
}
