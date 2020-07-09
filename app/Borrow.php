<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    public function customer() {
        return $this->belongsTo('App\Customer','customer_id');
    }
    public function books() {
        return $this->belongsToMany('App\Book','books_borrow','borrow_id','book_id');
    }
}
