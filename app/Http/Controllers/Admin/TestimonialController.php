<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TestimonialsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Testimonial\TestimonialStoreRequest;
use App\Http\Requests\Admin\Testimonial\TestimonialUpdateRequest;
use App\Models\Testimonial;
use App\Services\TestimonialService;
use App\ViewModels\TestimonialViewModel;
use Illuminate\View\View;


class TestimonialController extends Controller
{
    
    private $testimonialService;
    public function __construct()
    {
        $this->middleware('permission:testimonials.read', ['only' => ['index']]);
        $this->middleware('permission:testimonials.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:testimonials.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:testimonials.delete', ['only' => ['destroy']]);
        $this->testimonialService = new TestimonialService();    
    }
    
    /**
     * Display a listing of the resource.
    */
    public function index(TestimonialsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.testimonials.index');
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.pages.testimonials.form' , new TestimonialViewModel());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialStoreRequest $request) 
    {
        $this->testimonialService->store($request->validated());
        return $this->returnSuccess(__('testimonial added succefully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial) : View
    {
        return view('admin.pages.testimonials.form' , new TestimonialViewModel($testimonial));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialUpdateRequest $request, Testimonial $testimonial) 
    {
        $this->testimonialService->update($testimonial , $request->validated());
        return $this->returnSuccess(__('testimonial updated succefully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial) 
    {
        $this->testimonialService->delete($testimonial);
        return $this->returnSuccess(__('testimonial deleted succefully'));
    }
    
}
