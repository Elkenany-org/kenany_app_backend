<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RolesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\RoleStoreRequest;
use App\Http\Requests\Admin\Role\RoleUpdateRequest;
use App\Models\Role;
use App\ViewModels\RoleViewModel;


class RoleController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('permission:roles.read', ['only' => ['index']]);
        $this->middleware('permission:roles.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:roles.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:roles.delete', ['only' => ['destroy']]);
    }

     /**
     * Display a listing of the resource.
    */
    public function index(RolesDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.roles.index');
    }

    public function create()
    {
        return view('admin.pages.roles.form' , new RoleViewModel());
    }

    public function store(RoleStoreRequest $roleRequest)
    {
        $role =  Role::create($roleRequest->validated() + ['guard_name' => 'admin']);
        $role->givePermissionTo($roleRequest->permissions);
        return $this->returnSuccess(__('Role added succefully'));
    }

    public function show(Role $role)
    {
        return view('admin.pages.roles.show' , new RoleViewModel($role));
    }

    public function edit(Role $role)
    {
        return view('admin.pages.roles.form' , new RoleViewModel($role));
    }

    public function  update(RoleUpdateRequest $roleRequest ,Role $role)
    {
        $role->update($roleRequest->validated());
        $role->syncPermissions($roleRequest->permissions);
        return $this->returnSuccess(__('Role updated succefully'));
    }

    public function destroy(Role $role)
    {   
        if($role->name == 'admin'){
            return $this->returnWrong(__('Cannot Delete Admin Role'));
        }else{
            $role->delete();
            return $this->returnSuccess(__('Role deleted succefully'));
        }
    }
  
}
