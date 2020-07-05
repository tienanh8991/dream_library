<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    public function Customer() {
        return $this->belongsTo('App\Customer','customer_id');
    }
}
