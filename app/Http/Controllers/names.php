<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class names extends Controller
{
    protected function getPersons($name){

        return 'My name is '.$name. ".Its nice to meet you.";
       }
}
