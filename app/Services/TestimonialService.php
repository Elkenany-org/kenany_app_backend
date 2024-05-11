<?php 

namespace App\Services;

use App\Models\Testimonial;
use Illuminate\Support\Arr;

class TestimonialService {

    public function getData(array $data ,int $paginate = 15){
        return  Testimonial::filter($data)->orderBy('id','desc')->paginate($paginate);
    }

    public function store(array $data){
        $testimonial =  Testimonial::create( Arr::except($data , 'image'));
        if(isset($data['image'])){
            $testimonial->storeFile($data['image']);
        }
        return $testimonial;
    }

    public function update($testimonial ,$data){
        $testimonial->update(Arr::except($data,['image']));
        if(isset($data['image'])){
            $testimonial->updateFile($data['image']);
        }
        return $testimonial;
    }

    public function delete($testimonial){
        $testimonial->deleteFiles();
        $testimonial->delete();
    }

}