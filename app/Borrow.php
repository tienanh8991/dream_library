<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    public function customer() {
        return $this->belongsTo('App\Customer','customer_id');
    }
    public function book() {
        return $this->belongsTo('App\Book');
    }
}
