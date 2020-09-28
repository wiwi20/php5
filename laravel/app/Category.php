<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public $fillable = ['title'];

    public function newsItems(){
        return $this ->hasMany(NewsItem::class);
    }

}
