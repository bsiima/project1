<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class books extends Controller
{
    protected function getNovel($name){

        return 'I love'.$name;
       }
}
