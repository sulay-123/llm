<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    //
    public $table = 'events';
    protected $appends = ['full_image'];


    public function getFullImageAttribute() {
        return url('/').'/storage/image/'.$this->image;
    }
}
