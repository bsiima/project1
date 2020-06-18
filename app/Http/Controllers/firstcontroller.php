<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class firstcontroller extends Controller
{
   protected function getWelcomepage($name){

    return 'I love'.$name;
   }
}
