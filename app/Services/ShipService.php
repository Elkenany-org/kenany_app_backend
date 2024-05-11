<?php 

namespace App\Services;

use App\Models\Ship;
use Illuminate\Support\Arr;

class ShipService {

    public function getData(array $data ,int $paginate = 15){
        return  Ship::filter($data)->orderBy('id','desc')->paginate($paginate);
    }

    public function store(array $data){
        $ship  =  Ship::create( Arr::except($data , 'image'));
        return $ship;
    }

    public function update($ship ,$data){
        $ship->update(Arr::except($data,['image']));
        return $ship;
    }

    public function delete($ship){
        $ship->delete();
    }

}