<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\NotificationsDataTable;
use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\ServiceStoreRequest;
use App\Http\Requests\Admin\Service\ServiceUpdateRequest;
use App\Models\Pos;
use App\ViewModels\NotificationViewModel;
use App\ViewModels\PosViewModel;
use Illuminate\View\View;


class NotificationController extends Controller
{
    
    // private $posService; 
    public function __construct()
    {
        $this->middleware('permission:notifications.read', ['only' => ['index']]);
        $this->middleware('permission:notifications.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:notifications.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:notifications.delete', ['only' => ['destroy']]);
        // $this->posService = new PosService();    
    }
    
    public function index(NotificationsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.notifications.index');
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.pages.notifications.form' , new NotificationViewModel());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceStoreRequest $request) 
    {
        $this->posService->store($request->validated());
        return $this->returnSuccess(TranslationHelper::translate('pos_added_succefully' , 'message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pos $posB) : View
    {
        return view('admin.pages.pos.form' , new PosViewModel($posB));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceUpdateRequest $request, Pos $pos) 
    {
        $this->posService->update($pos , $request->validated());
        return $this->returnSuccess(TranslationHelper::translate('pos_updated_succefully' , 'message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pos $pos) 
    {
        $this->posService->delete($pos);
        return $this->returnSuccess(TranslationHelper::translate('pos_deleted_succefully' , 'message'));
    }
    
}
