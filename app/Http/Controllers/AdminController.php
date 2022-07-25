<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;

class AdminController extends Controller
{

    public function __construct()
    {
        /* $this->middleware('auth');
        $this->middleware('admin'); */
    }

    public function getAdministrationView() {
        $nonAdminUsers = User::get();
        return view('administration', ['users' => $nonAdminUsers, 'roles' => Role::get()]);
    }

    public function getRolesView() {
        return view('roles.roles', ['roles' => Role::get()]);
    }

    public function newRole() {
        return view('roles.create');
    }

    public function store(RoleRequest $request) {
        // Create role
        $role = new Role;
        $role->name = $request->input('name');
        $role->save();

        return redirect('roles')->with('success', 'Role added!');
    }

    public function edit(Role $role) {
        return view('roles.edit', ['role' => $role]);
    }

    public function update(RoleRequest $request, Role $role) {
        $role->name = $request->name;
        $role->save();

        return redirect('roles')->with('success', 'Post updated!');
    }

    public function roleInsert(RoleRequest $request) {
        $role = new Role;
        $role->name = $request->name;
        $role->save();
        return redirect('/roles');
    }

    public function delete(Role $role) {
        $role->delete($role);
        return redirect('roles')->with('success', 'Role deleted!');
    }
}
