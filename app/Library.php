<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    public function books() {
        return $this->hasMany('App\Book','library_id');
    }

    public function users() {
        return $this->hasMany('App\User','library_id');
    }
}
