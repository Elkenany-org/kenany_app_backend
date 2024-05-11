<?php

namespace App\Http\Controllers\Admin;


use App\DataTables\PortsDataTable;
use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Port\PortStoreRequest;
use App\Http\Requests\Admin\Port\PortUpdateRequest;
use App\Models\Port;
use App\Services\PortService;
use App\ViewModels\PortViewModel;
use Illuminate\View\View;


class PortController extends Controller
{
    private $portService;
    
    public function __construct()
    {
        $this->middleware('permission:ports.read', ['only' => ['index']]);
        $this->middleware('permission:ports.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:ports.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:ports.delete', ['only' => ['destroy']]);
        $this->portService = new PortService();    
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(PortsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.ports.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.pages.ports.form' , new PortViewModel());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PortStoreRequest $request) 
    {
        $this->portService->store($request->validated());
        return $this->returnSuccess(TranslationHelper::translate('port_added_successfully' , 'message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Port $port) : View
    {
        return view('admin.pages.ports.form' , new PortViewModel($port));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PortUpdateRequest $request, Port  $port)
    {
        $this->portService->update($port , $request->validated());
        return $this->returnSuccess(TranslationHelper::translate('port_updated_successfully' , 'message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Port  $port) 
    {
        $this->portService->delete($port);
        return $this->returnSuccess(TranslationHelper::translate('port_deleted_successfully' , 'message'));
    }
    
}               
