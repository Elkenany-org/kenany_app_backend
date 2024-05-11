<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PortController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductShipController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ShipController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UploadCkImageController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::middleware('guest:admin')->group(function(){
    Route::get('/admin/login'        ,[AuthController::class , 'login'])->name('login');
    Route::post('/admin/loginAction' ,[AuthController::class , 'loginAction'])->name('login.action');
});


Route::group(
[
	'prefix' => LaravelLocalization::setLocale() . '/admin',
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){ 

    Route::middleware(['auth:admin'])->group(function(){
        
        Route::get('/'                   ,[DashboardController::class , 'index'])->name('index');
        Route::resource('/slider'        ,SliderController::class);
        Route::resource('/notification'  ,NotificationController::class);
        Route::resource('/category'      ,CategoryController::class);
        Route::resource('/port'         ,PortController::class);
        Route::resource('/shipsProduct' ,ProductShipController::class);
        Route::resource('/ship' ,ShipController::class);
        Route::resource('/role'          ,RoleController::class);
        Route::resource('/package'       ,PackageController::class);
        
        //companies
        Route::resource('/company'       ,CompanyController::class);
        Route::get('companies/excel' ,[CompanyController::class , 'export'] )->name('companies.export');
        Route::resource('/country'       ,CountryController::class);
        Route::resource('/about'         ,AboutController::class);
        Route::resource('/contact'       ,ContactController::class);
        Route::resource('/product'       ,ProductController::class);
        Route::get('/product-check-slug'              ,[ProductController::class , 'checkSlug'])->name('product.check.slug');
        Route::get('product/delete/single/img/{img}'  ,[ProductController::class , 'deleteImg'])->name('delete_product_image');
        Route::resource('/faq'                        ,FaqController::class);
        Route::resource('/user'                       ,UserController::class);
        Route::resource('/admin'                      ,AdminController::class);
        Route::get('admin_country' , [AdminController::class ,'adminCountryView'])->name('admin.country.view');
        Route::resource('/testimonial'                ,TestimonialController::class);

        Route::post('/logout'  ,[AuthController::class , 'logout'])->name('logout');
        /************************************ setting ************************************************/
        Route::controller(SettingController::class)->group(function () {
            Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {    
                //home
                Route::get('/setting-home',  'homeForm')->name('form.home');
                Route::get('/setting/{page}',  'pageForm')->name('form.page');
                Route::post('/setting-home',  'updateHome')->name('update.home');

                //application
                Route::get('/setting-application', 'applicationForm')->name('form.application');

                //social
                Route::get('/setting-social',  'socialForm')->name('form.social');
                Route::post('/setting-social',  'updateSocial')->name('update.social');
            });
        });
        /************************************ setting ************************************************/
        Route::post('upload-ck-images' , [UploadCkImageController::class , 'uploadImage'])->name('upload-ck-images');
    });
    
});


