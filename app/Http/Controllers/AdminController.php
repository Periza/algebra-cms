<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function getAdministrationView() {
        $nonAdminUsers = User::where('role_id', '=', 'null')->orderBy('created_at')->get();
        $nonAdminUsers = User::get();
        return view('administration', ['users' => $nonAdminUsers, 'roles' => Role::get()]);
    }

    public function getRolesView() {
        return view('roles', ['roles' => Role::get()]);
    }

    public function newRole() {
        return view('roleNew');
    }

    public function roleInsert(Request $request) {
        $role = new Role;
        $role->name = $request->name;
        $role->save();
        return redirect('/roles');
    }

    public function roleDelete(Request $request, Role $role) {
        $role->delete();
        return redirect('/roles');
    }
}
