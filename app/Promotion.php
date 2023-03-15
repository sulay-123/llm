<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //
    public $table = 'promotion';
    protected $appends = ['full_image'];


    public function getFullImageAttribute() {
        return url('/').'/storage/image/'.$this->image;
    }
}
