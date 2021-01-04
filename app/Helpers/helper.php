<?php

use App\Models\File\File;

if (!function_exists('userFiles')){
    function userFiles(){
        return auth()->user()->files()->finished()->latest()->get();
    }
}

if (!function_exists('UserOwnsFile')){
    function UserOwnsFile($id): bool
    {
        return auth()->user()->id == $id;
    }
}
