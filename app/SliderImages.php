<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderImages extends Model
{
    //
    Public $table = 'slider_images';
    protected $appends = ['full_image'];


    public function getFullImageAttribute() {
        return url('/').'/storage/image/'.$this->image;
    }
}
