<?php

namespace App\Http\Controllers\SystemAdministration\Security;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $roles = Role::all();
        return view('system_administration.security.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $permissions = Permission::all()->pluck('name', 'id');

        return view('system_administration.security.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoleRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRoleRequest $request)
    {

        $role = Role::create($request->only('name'));

        $permissions = $request->only('permissions');

        $role->syncPermissions($permissions);

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return Application|Factory|View|void
     */
    public function show(Role $role)
    {
        return view('system_administration.security.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return Application|Factory|View|void
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all()->pluck('name', 'id');

        $role->load('permissions');

        return view('system_administration.security.roles.edit', compact('permissions','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleRequest $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->only('name'));

        $permissions = $request->only('permissions');

        $role->syncPermissions($permissions);

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return back();
    }
}
