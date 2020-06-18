<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class animals extends Controller
{
    protected function getPetName($name){

        return 'I love'.$name;
       }
}
