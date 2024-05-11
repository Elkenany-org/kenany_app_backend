<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoriesDataTable;
use App\DataTables\CompaniesDataTable;
use App\DataTables\CountriesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryStoreRequest;
use App\Http\Requests\Admin\Category\CategoryUpdateRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\Country;
use App\Services\CategoryService;
use App\ViewModels\CategoryViewModel;
use App\ViewModels\CompanyViewModel;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class CountryController extends Controller
{
    // private $categoryService;
    public function __construct()
    {
        $this->middleware('permission:countries.read', ['only' => ['index']]);
        $this->middleware('permission:countries.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:countries.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:countries.delete', ['only' => ['destroy']]);
        // $this->categoryService = new CategoryService();    
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(CountriesDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.countries.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.pages.companies.form' , new CompanyViewModel());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request) 
    {
        $this->categoryService->store($request->validated());
        return $this->returnSuccess(__('Company added succefully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category) : View
    {
        return view('admin.pages.categories.form' , new CategoryViewModel($category));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $this->categoryService->update($category , $request->validated());
        return $this->returnSuccess(__('Category updated succefully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category) 
    {
        $this->categoryService->delete($category);
        return $this->returnSuccess(__('Category deleted succefully'));
    }
    
}               
