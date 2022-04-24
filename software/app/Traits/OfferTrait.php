<?php
namespace App\Traits;


Trait OfferTrait{


    function saveImage($photo,$folder){
        //save photo in folder
    //   $photo=$request->file('photo');
    $file_extention=$photo->getClientOriginalName();
    $file_name=time().$file_extention;
    $path=$folder;
    $photo->move($path,$file_name);
    return $file_name;
    }















}































?>
