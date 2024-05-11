<?php 

namespace App\Services;

use App\Models\About;
use App\Models\Faq;
use Illuminate\Support\Arr;

class FaqService {

    public function getData(array $data ,int $paginate = 15){
        return  Faq::filter($data)->orderBy('id','desc')->paginate($paginate);
    }

    public function store(array $data){
        return Faq::create($data);
    }

    public function update($faq ,$data){
       return $faq->update($data);
    }

    public function delete($about){
        $about->delete();
    }

}