<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductStoreRequest;
use App\Http\Requests\Admin\Product\ProductUpdateRequest;
use App\Models\Product;
use App\Services\ProductService;
use App\ViewModels\ProductViewModel;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\View\View;


class ProductController extends Controller
{
    private $productService;
    public function __construct()
    {
        $this->middleware('permission:products.read', ['only' => ['index']]);
        $this->middleware('permission:products.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:products.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:products.delete', ['only' => ['destroy']]);
        $this->productService = new ProductService();    
    }
    
     /**
     * Display a listing of the resource.
    */
    public function index(ProductsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.products.index');
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create() : View
    {
        return view('admin.pages.products.form' , new ProductViewModel());
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(ProductStoreRequest $request) 
    {
        $this->productService->store($request->validated());
        return $this->returnSuccess(__('Product added succefully'));
    }

    /**
     * Show the form for editing the specified resource.
    */
    public function edit(Product $product) : View
    {
        return view('admin.pages.products.form' , new ProductViewModel($product));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(ProductUpdateRequest $request, Product $product) 
    {
        $this->productService->update($product , $request->validated());
        return $this->returnSuccess(__('Product updated succefully'));
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(Product $product)
    {
        $this->productService->delete($product);
        return $this->returnSuccess(__('Product deleted succefully'));
    }

    public function deleteImg($id){
        $this->productService->delImg($id);
        session()->flash('success' , __('تم مسح الصورة بنجاح'));
        return back();
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Product::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
    
}
