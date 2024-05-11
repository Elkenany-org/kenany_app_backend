<?php 

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Arr;

class CategoryService {

    public function getData(array $data ,int $paginate = 15){
        return  Category::filter($data)->orderBy('id','desc')->paginate($paginate);
    }

    public function store(array $data){
        $category =  Category::create( Arr::except($data , 'image'));
        if(isset($data['image'])){
            $category->storeFile($data['image']);
        }
        return $category;
    }

    public function update($category ,$data){
       
        $category->update(Arr::except($data,['image']));
        if(isset($data['image'])){
            $category->updateFile($data['image']);
        }
        return $category;
    }

    public function delete($category){
        $category->deleteFiles();
        $category->delete();
    }

}