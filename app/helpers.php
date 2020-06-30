<?php

function currentUser(){
    if(Auth::check()){
        return auth()->user();
    }
	return null;
}

function currentUserId(){
    if(Auth::check()){
        return auth()->user()->id;
    }
    return null;
}


//Image resize with proper aspect ratio.
function imageresize($width, $image, $subfolder='')
{
    $filename = date('dmy-hm-') . $width. '-' . $image->getClientOriginalName();

    if($subfolder != ''){
    	$subfolder = $subfolder . '/';
    }

    // $subfolder = $subfolder : $subfolder . '/' : '';
    $store_path = 'app/public/' . $subfolder.$filename;
    $return_path = $subfolder.$filename;

    Image::make($image)
    ->resize($width, null, function ($constraint){ 
        $constraint->aspectRatio(); 
        $constraint->upsize();
        })
        ->save(storage_path($store_path));

    return $return_path;
}