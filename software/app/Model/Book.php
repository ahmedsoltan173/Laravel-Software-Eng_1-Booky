<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table="books";
    protected $fillable=['name','price','description','stock','author','categories','photo','created_at','updated_at'];
    protected $hidden=['created_at'];

#################################################################

    public function categories(){
        return $this->belongsTo('App\Model\Category','id');
    }
    public function cart(){
        return $this ->belongsToMany('App\User','carts','book_id','users_id','id','id');

    }


}
