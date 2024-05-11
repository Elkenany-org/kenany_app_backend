<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AboutsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\AboutStoreRequest;
use App\Http\Requests\Admin\About\AboutUpdateRequest;
use App\Models\About;
use App\Services\AboutService;
use App\ViewModels\AboutViewModel;
use Illuminate\View\View;


class AboutController extends Controller
{
    
    private $aboutService;
    public function __construct()
    {
        $this->middleware('permission:abouts.read', ['only' => ['index']]);
        $this->middleware('permission:abouts.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:abouts.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:abouts.delete', ['only' => ['destroy']]);
        $this->aboutService = new AboutService();    
    }
    
    /**
     * Display a listing of the resource.
    */
    public function index(AboutsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.abouts.index');
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.pages.abouts.form' , new AboutViewModel());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutStoreRequest $request) 
    {
        $this->aboutService->store($request->validated());
        return $this->returnSuccess(__('About added succefully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about) : View
    {
        return view('admin.pages.abouts.form' , new AboutViewModel($about));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutUpdateRequest $request, About $about) 
    {
        $this->aboutService->update($about , $request->validated());
        return $this->returnSuccess(__('About updated succefully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about) 
    {
        $this->aboutService->delete($about);
        return $this->returnSuccess(__('About deleted succefully'));
    }
    
}
