<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class school extends Controller
{
    protected function getWelcomepage($name){

        return 'I love'.$name;
       }
}
