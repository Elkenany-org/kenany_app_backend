<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductShipDataTable;
use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ShipProduct\ShipProductStoreRequest;
use App\Http\Requests\Admin\ShipProduct\ShipProductUpdateRequest;
use App\Models\Port;
use App\Models\ShipsProduct;
use App\Services\ProductShipService;
use App\ViewModels\PortViewModel;
use App\ViewModels\ShipProductViewModel;
use Illuminate\View\View;


class ProductShipController extends Controller
{
    private $productShipService;
    
    public function __construct()
    {
        $this->middleware('permission:product_ships.read', ['only' => ['index']]);
        $this->middleware('permission:product_ships.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product_ships.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product_ships.delete', ['only' => ['destroy']]);
        $this->productShipService = new ProductShipService();    
    }
    
    /**
     * Display a listing of the resource.
    */
    public function index(ProductShipDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.ship_products.index');
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create() : View
    {
        return view('admin.pages.ship_products.form' , new ShipProductViewModel());
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(ShipProductStoreRequest $request) 
    {
        $this->productShipService->store($request->validated());
        return $this->returnSuccess(TranslationHelper::translate('product_added_successfully' , 'message'));
    }

    /**
     * Show the form for editing the specified resource.
    */
    public function edit(ShipsProduct $shipsProduct) : View
    {
        return view('admin.pages.ship_products.form' , new ShipProductViewModel($shipsProduct));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(ShipProductUpdateRequest $request,ShipsProduct $shipsProduct)
    {
        $this->productShipService->update($shipsProduct , $request->validated());
        return $this->returnSuccess(TranslationHelper::translate('product_updated_successfully' , 'message'));
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(Port  $port) 
    {
        $this->productShipService->delete($port);
        return $this->returnSuccess(TranslationHelper::translate('product_deleted_successfully' , 'message'));
    }
    
}               
