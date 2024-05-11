<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use ZipArchive;

trait HandleUploadFile
{

    public function storeFile(?UploadedFile $image , $prefix ='', $alt = 'photo'): void
    {
        if (isset($image)) {
            $this->addMedia($image)->withCustomProperties(['alt' => $alt])->toMediaCollection($this->getTable().$prefix);
        }
    }

    public function storeFiles(array $images , $prefix =''): void
    {
        if (! empty($images)) {
            foreach ($images as $key => $image) {
                $this->addMedia($image)->toMediaCollection($this->getTable().$prefix);
            }
        }
    }

    public function updateFile($image,$prefix ='', $alt = 'photo'): void
    {
        if (isset($image)) {
            $this->clearMediaCollection($this->getTable().$prefix);
            $this->addMedia($image)->withCustomProperties(['alt' => $alt])->toMediaCollection($this->getTable().$prefix);
        }
    }

    public function updateFiles($images , $prefix =''): void
    {
        if (isset($images)) {
            $this->clearMediaCollection($this->getTable());
            foreach ($images as $key => $image) {
                $this->addMedia($image)->toMediaCollection($this->getTable().$prefix);
            }
        }
    }

    public function deleteFiles(): void
    {
        $this->clearMediaCollection($this->getTable());
    }
    
}