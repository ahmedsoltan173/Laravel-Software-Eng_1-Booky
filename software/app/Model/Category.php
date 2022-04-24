<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table="categories";
    protected $fillable=['id','name','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
// public $timestamp=false;



##############################################################3
public function books(){
    return $this->hasMany('App\Model\Book','categories','id');
}


}
