<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ShipMovementDataTable;
use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ship\ShipStoreRequest;
use App\Http\Requests\Admin\Ship\ShipUpdateRequest;
use App\Models\Ship;
use App\Services\ShipService;
use App\ViewModels\ShipViewModel;
use Illuminate\View\View;


class ShipController extends Controller
{
    private $shipService;
    
    public function __construct()
    {
        $this->middleware('permission:ship_movements.read', ['only' => ['index']]);
        $this->middleware('permission:ship_movements.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:ship_movements.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:ship_movements.delete', ['only' => ['destroy']]);
        $this->shipService = new ShipService();    
    }
    
    /**
     * Display a listing of the resource.
    */
    public function index(ShipMovementDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.ships.index');
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create() : View
    {
        return view('admin.pages.ships.form' , new ShipViewModel());
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(ShipStoreRequest $request) 
    {
        $this->shipService->store($request->validated());
        return $this->returnSuccess(TranslationHelper::translate('ship_added_successfully' , 'message'));
    }

    /**
     * Show the form for editing the specified resource.
    */
    public function edit(Ship $ship) : View
    {
        return view('admin.pages.ships.form' , new ShipViewModel($ship));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(ShipUpdateRequest $request,Ship $ship)
    {
        $this->shipService->update($ship , $request->validated());
        return $this->returnSuccess(TranslationHelper::translate('ship_updated_successfully' , 'message'));
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(Ship $ship) 
    {
        $this->shipService->delete($ship);
        return $this->returnSuccess(TranslationHelper::translate('ship_deleted_successfully' , 'message'));
    }
    
}               
