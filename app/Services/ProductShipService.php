<?php 

namespace App\Services;

use App\Models\ShipsProduct;
use Illuminate\Support\Arr;

class ProductShipService {

    public function getData(array $data ,int $paginate = 15){
        return  ShipsProduct::filter($data)->orderBy('id','desc')->paginate($paginate);
    }

    public function store(array $data){
        $product =  ShipsProduct::create( Arr::except($data , 'image'));
        return $product;
    }

    public function update($product ,$data){
        $product->update(Arr::except($data,['image']));
        return $product;
    }

    public function delete($product){
        $product->delete();
    }

}