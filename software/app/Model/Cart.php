<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $table="carts";
    protected $fillable=['id','users_id','book_id','number','created_at','updated_at'];
    protected $hidden=['created_at'];
// public $timestamp=false;
}
