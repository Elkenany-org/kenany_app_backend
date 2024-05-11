<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Services\UserService;


class UserController extends Controller
{
    
    private $userService;
    public function __construct()
    {
        $this->middleware('permission:users.read', ['only' => ['index']]);
        $this->middleware('permission:users.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:users.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:users.delete', ['only' => ['destroy']]);
        $this->userService = new UserService();    
    }
    
    /**
     * Display a listing of the resource.
    */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.users.index');
    }
    
}
