<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function category() {
        return $this->belongsTo('App\Category','category_id');
    }
    public function borrows() {
        return $this->belongsToMany('App\Borrow','books_borrow','book_id','borrow_id');
    }

    public function library() {
        return $this->belongsTo('App\Library','library_id');
    }
}
