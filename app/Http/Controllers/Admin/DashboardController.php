<?php

namespace App\Http\Controllers\Admin;

use App\Enum\RestrictionTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Port;
use App\Models\Product;
use App\Models\Ship;

class DashboardController extends Controller
{
    public function index(){
        $companies    = Company::count();
        $ships        = Ship::count();
        $admins       = Admin::count();
        $ports        = Port::count();
        return view('admin.index' , get_defined_vars());
    }
}
