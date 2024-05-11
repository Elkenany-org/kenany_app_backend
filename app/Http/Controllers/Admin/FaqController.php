<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FaqsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Faq\FaqStoreRequest;
use App\Http\Requests\Admin\Faq\FaqUpdateRequest;
use App\Models\Faq;
use App\Services\FaqService;
use App\ViewModels\FaqViewModel;
use Illuminate\View\View;


class FaqController extends Controller
{
    
    private $faqService;
    public function __construct()
    {
        $this->middleware('permission:faqs.read', ['only' => ['index']]);
        $this->middleware('permission:faqs.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:faqs.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:faqs.delete', ['only' => ['destroy']]);
        $this->faqService = new FaqService();    
    }
    
    /**
     * Display a listing of the resource.
    */
    public function index(FaqsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.faqs.index');
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create() : View
    {
        return view('admin.pages.faqs.form' , new FaqViewModel());
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(FaqStoreRequest $request) 
    {
        $this->faqService->store($request->validated());
        return $this->returnSuccess(__('Faq added succefully'));
    }

    /**
     * Show the form for editing the specified resource.
    */
    public function edit(Faq $faq) : View
    {
        return view('admin.pages.faqs.form' , new FaqViewModel($faq));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(FaqUpdateRequest $request, Faq $faq) 
    {
        $this->faqService->update($faq , $request->validated());
        return $this->returnSuccess(__('Faq updated succefully'));
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(Faq $faq) 
    {
        $this->faqService->delete($faq);
        return $this->returnSuccess(__('Faq deleted succefully'));
    }
    
}
