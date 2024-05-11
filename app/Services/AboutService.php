<?php 

namespace App\Services;

use App\Models\About;
use Illuminate\Support\Arr;

class AboutService {

    public function getData(array $data ,int $paginate = 15){
        return  About::filter($data)->orderBy('id','desc')->paginate($paginate);
    }

    public function store(array $data){
        $about =  About::create( Arr::except($data , 'image'));
        if(isset($data['image'])){
            $about->storeFile($data['image']);
        }
        return $about;
    }

    public function update($about ,$data){
        $about->update(Arr::except($data,['image']));
        if(isset($data['image'])){
            $about->updateFile($data['image']);
        }
        return $about;
    }

    public function delete($about){
        $about->deleteFiles();
        $about->delete();
    }

}