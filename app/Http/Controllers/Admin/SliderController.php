<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BannersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Slider\SliderStoreRequest;
use App\Http\Requests\Admin\Slider\SliderUpdateRequest;
use App\Models\Slider;
use App\Services\SliderService;
use App\ViewModels\SliderViewModel;
use Illuminate\View\View;


class SliderController extends Controller
{
    
    private $sliderService;
    public function __construct()
    {
        $this->middleware('permission:sliders.read', ['only' => ['index']]);
        $this->middleware('permission:sliders.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:sliders.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:sliders.delete', ['only' => ['destroy']]);
        $this->sliderService = new SliderService();    
    }
    
    /**
     * Display a listing of the resource.
    */
    public function index(BannersDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.sliders.index');
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create() : View
    {
        return view('admin.pages.sliders.form' , new SliderViewModel());
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(SliderStoreRequest $request) 
    {
        $this->sliderService->store($request->validated());
        return $this->returnSuccess(__('slider added succefully'));
    }

    /**
     * Show the form for editing the specified resource.
    */
    public function edit(Slider $slider) : View
    {
        return view('admin.pages.sliders.form' , new SliderViewModel($slider));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(SliderUpdateRequest $request, Slider $slider)
    {
        $this->sliderService->update($slider , $request->validated());
        return $this->returnSuccess(__('slider updated succefully'));
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(Slider $slider) 
    {
        $this->sliderService->delete($slider);
        return $this->returnSuccess(__('slider deleted succefully'));
    }
    
}
