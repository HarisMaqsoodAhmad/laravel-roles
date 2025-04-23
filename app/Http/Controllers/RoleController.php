<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all roles
        $roles = Role::all();

        // Pass the roles to the view
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all Permissions
        $permissions = Permission::all();

        // Pass the permissions to the view
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required|array',
        ]);

        // Create a new role
        $role = Role::create(['name' => $request->name]);

        // Sync the permissions with the role
        $role->syncPermissions($request->permissions);

        // Redirect to the roles list
        return redirect()->route('roles.index')->with('success', 'Role (' . $request->name . ') created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch the role by ID
        $role = Role::findOrFail($id);
        // Fetch roles permissions
        $permissions = $role->permissionns;

        // Pass the role and permissions to the view
        return view('roles.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Fetch the role by ID
        $role = Role::findOrFail($id);

        // Fetch all permissions
        $permissions = Permission::all();

        // Fetch the role's permissions
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        // Pass the role and permissions to the view
        return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'permissions' => 'required|array',
        ]);

        // Fetch the role by ID
        $role = Role::findOrFail($id);

        // Update the role name
        $role->name = $request->name;

        $role->save();

        // Sync the permissions with the role
        $role->syncPermissions($request->permissions);

        // Redirect to the roles list
        return redirect()->route('roles.index')->with('success', 'Role (' . $request->name . ') updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Fetch the role by ID
        $role = Role::findOrFail($id);

        // Delete the role
        $role->delete();

        // Redirect to the roles list
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
