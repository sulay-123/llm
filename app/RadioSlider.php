<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadioSlider extends Model
{
    //
    public $table = 'radio_slider';

    protected $appends = ['full_image'];


    public function getFullImageAttribute() {
        return url('/').'/storage/image/'.$this->image;
    }
}
