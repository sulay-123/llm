<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    //
    public $table = 'contact_us';
    public $fillable = ['name', 'email', 'city', 'state', 'country', 'phone', 'date', 'time', 'address', 'zipcode', 'other'];
    public $timestamps = false;
}
