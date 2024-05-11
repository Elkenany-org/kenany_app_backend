<?php 

namespace App\Services;

use App\Models\User;

class UserService {

    public function getData(array $data ,int $paginate = 15){
        return  User::filter($data)->orderBy('id','desc')->paginate($paginate);
    }

}