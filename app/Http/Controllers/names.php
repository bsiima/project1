<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class names extends Controller
{
    protected function getPersons($girl){

        return 'My name is '.$girl. ".Its nice to meet you.";
       }
}
