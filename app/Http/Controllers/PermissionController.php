<?php

namespace systemAPV\Http\Controllers;

use Illuminate\Http\Request;
use systemAPV\Models\Role;
use systemAPV\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $permissions = Permission::all();

        return view('administrador.permissions.index', compact('permissions'));
    }

    public function roles($id)
    {
        $permission = Permission::find($id);

        $roles = $permission->roles;

        return view('administrador.permissions.roles', compact('permission','roles'));
    }
}
