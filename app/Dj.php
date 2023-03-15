<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dj extends Model
{
    //
    public $table = 'dj';
    protected $appends = ['full_image'];


    public function getFullImageAttribute() {
        return url('/').'/storage/image/'.$this->image;
    }
}
