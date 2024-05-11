<?php 

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProductService {

    public function getData(array $data ,int $paginate = 15){
        return  Product::filter($data)->orderBy('id','desc')->paginate($paginate);
    }

    public function store(array $data){
        $tour =  Product::create( Arr::except($data , ['image' , 'images']));
        if(isset($data['image'])){
            $tour->storeFile($data['image'],'-main');
        }
        if(isset($data['images'])){
            $tour->storeFiles($data['images']);
        }
        return $tour;
    }

    public function update($tour ,$data){
        $tour->update(Arr::except($data,['image' , 'images']));
        if(isset($data['image'])){
            $tour->updateFile($data['image'],'-main');
        }
        if(isset($data['images'])){
            $tour->storeFiles($data['images']);
        }
        return $tour;
    }

    public function delete($tour){
        $tour->deleteFiles();
        $tour->delete();
    }

    public function delImg($id)
    {
        DB::table('media')->where('id',$id)->delete();
    }

}