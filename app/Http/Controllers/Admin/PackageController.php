<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CompaniesDataTable;
use App\DataTables\PackagesDataTable;
use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\ServiceStoreRequest;
use App\Http\Requests\Admin\Service\ServiceUpdateRequest;
use App\Models\Company;
use App\Models\Package;
use App\Services\ServiceService;
use App\ViewModels\FacilityViewModel;
use App\ViewModels\PackageViewModel;
use Illuminate\View\View;


class PackageController extends Controller
{
    
    // private $facilityService;
    
    public function __construct()
    {
        $this->middleware('permission:packages.read', ['only' => ['index']]);
        $this->middleware('permission:packages.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:packages.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:packages.delete', ['only' => ['destroy']]);
        // $this->facilityService = new ServiceService();    
    }
    
    /**
     * Display a listing of the resource.
    */
    public function index(PackagesDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.packages.index');
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.pages.packages.form' , new PackageViewModel());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceStoreRequest $request) 
    {
        $this->facilityService->store($request->validated());
        return $this->returnSuccess(TranslationHelper::translate('facility_added_succefully' , 'message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package) : View
    {
        return view('admin.pages.packages.form' , new PackageViewModel($package));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceUpdateRequest $request, Company $facility) 
    {
        $this->facilityService->update($facility , $request->validated());
        return $this->returnSuccess(TranslationHelper::translate('facility_updated_succefully' , 'message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $facility) 
    {
        $this->facilityService->delete($facility);
        return $this->returnSuccess(TranslationHelper::translate('facility_deleted_succefully' , 'message'));
    }
    
}
