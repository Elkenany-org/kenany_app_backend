<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\AdminStoreRequest;
use App\Http\Requests\Admin\Admin\AdminUpdateRequest;
use App\Models\Admin;
use App\ViewModels\AdminViewModel;
use Illuminate\Support\Arr;


class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('permission:admins.read', ['only' => ['index']]);
        // $this->middleware('permission:admins.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:admins.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:admins.delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
    */
    public function index(AdminsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.admins.index');
    }

    public function create()
    {
        return view('admin.pages.admins.form', new AdminViewModel());
    }
     
    public function store(AdminStoreRequest $request)
    {
        $admin = Admin::create(Arr::except($request->validated() , 'image') + [ 'country_id' => auth('admin')->user()->country_id ]);
        if(isset($data['image'])){
            $admin->storeFile($data['image']);
        }
        $admin->assignRole($request->role);
        return $this->returnSuccess(__('Admin Added Successfully'));
    }

    public function edit(Admin $admin)
    {
        return view('admin.pages.admins.form', new AdminViewModel($admin));
    }

    public function update(AdminUpdateRequest $request,Admin $admin)
    {
        $data = $request->validated();
        $data['password'] = $request->password == null ? $admin->password : $request->password;
        $admin->update(Arr::except($data , 'image'));
        if(isset($data['image'])){
            $admin->updateFile($data['image']);
        }
        $admin->syncRoles($request->role);
        return $this->returnSuccess(__('Admin Updated Successfully'));
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return $this->returnSuccess(__('Admin Deleted Successfully'));
    }
    
    public function adminCountryView()
    {
        return view('admin.pages.admins.create_admin_country', new AdminViewModel());
    }
    
}
