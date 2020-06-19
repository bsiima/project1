<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class city extends Controller
{
    protected function getTown($city){

        return 'I live in '.$city;
       }
}
