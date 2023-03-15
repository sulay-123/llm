<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsers extends Model
{
    //
    public $table = 'sponsers';
    protected $appends = ['full_image'];


    public function getFullImageAttribute() {
        return url('/').'/storage/image/'.$this->image;
    }
}
