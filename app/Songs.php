<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Dj;
use App\Category;

class Songs extends Model
{
    //
    public $table = 'songs';
    protected $appends = ['full_song_url', 'full_image'];


    public function getFullSongUrlAttribute() {
        return url('/').'/storage/song/'.$this->song_url;
    }

    function djs() {
        return $this->belongsTo('App\Dj', 'dj_id', 'id');
    }

    function category() {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function getFullImageAttribute() {
        return url('/').'/storage/image/'.$this->image;
    }
}
