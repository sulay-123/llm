<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //
    public $table = 'player';
    protected $appends = ['full_radio1_image', 'full_radio2_image'];


    public function getFullRadio1ImageAttribute() {
        return url('/').'/storage/image/'.$this->radio1_image;
    }

    public function getFullRadio2ImageAttribute() {
        return url('/').'/storage/image/'.$this->radio2_image;
    }
}
