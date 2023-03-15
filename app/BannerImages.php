<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerImages extends Model
{
    //
    public $table = 'banner_images';
    protected $appends = ['full_image'];


    public function getFullImageAttribute() {
        return url('/').'/storage/image/'.$this->image;
    }
}
