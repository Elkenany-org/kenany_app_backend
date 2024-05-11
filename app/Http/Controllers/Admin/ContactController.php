<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ContactDataTable;
use App\Http\Controllers\Controller;
use App\Models\Contact;


class ContactController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('permission:contact.read', ['only' => ['index']]);
        $this->middleware('permission:contact.delete', ['only' => ['destroy']]); 
    }
    
    /**
     * Display a listing of the resource.
    */
    public function index(ContactDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.contact.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return $this->returnSuccess(__('Message deleted succefully'));
    }
    
}
