<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\HomeRequest;
use App\Http\Requests\Admin\Setting\SocialRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;


class SettingController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('permission:setting.edit', ['only' => ['homeForm', 'pageForm', 'updateHome', 'socialForm', 'updateSocial']]);
    }

    public function applicationForm(){
        return view('admin.pages.setting.application');
    }
    
    public function homeForm(){
        return view('admin.pages.setting.home');
    }

    public function pageForm($page){
         return view('admin.pages.setting.page' ,get_defined_vars());
    }

    public function updateHome(HomeRequest $request){

        foreach($request->validated() as $key => $record){
            Setting::where('option',$key)->update(['value'=>$record]);
        }
        
        $images = [ 'site_logo' , 'show_section_img', 'tours_page_image','about_page_image',
                    'contact_page_image','faq_page_image','site_logo_sticky'];
        
        foreach($images as $image){
            if($request->$image){
                $this->addStaticImage($request->$image , $image);
            }
        }
        
        $this->cacheSetting();
        return $this->returnSuccess(__('Setting Updated Successfully'));        
    }

    public function socialForm(){
        return view('admin.pages.setting.social');
    }

    public function updateSocial(SocialRequest $request){
        foreach($request->except('_token') as $key => $record){
            Setting::where('option',$key)->update(['value'=>$record]);
        }
        
        $this->cacheSetting();
        return $this->returnSuccess(__('Social Updated Successfully'));        
    }

    public function addStaticImage($image , $name){
        $record = Setting::where('option',$name)->first();
        if($record){
            $record->deleteFiles();
            $record->storeFile($image);
            $record->update(['value'=>['en'=> $record->getFirstMediaUrl('settings')]]);
        }
    } 
    
    public function cacheSetting(){
        Cache::forget('settings');
        Cache::rememberForever('settings', function () {
                 return Setting::get();
        });
    }
    
}
