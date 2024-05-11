<?php 

namespace App\Services;

use App\Models\Port;
use Illuminate\Support\Arr;

class PortService {

    public function getData(array $data ,int $paginate = 15){
        return  Port::filter($data)->orderBy('id','desc')->paginate($paginate);
    }

    public function store(array $data){
        $category =  Port::create( Arr::except($data , 'image'));
        return $category;
    }

    public function update($port ,$data){
        $port->update(Arr::except($data,['image']));
        return $port;
    }

    public function delete($port){
        $port->delete();
    }

}