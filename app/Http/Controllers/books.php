<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class books extends Controller
{
    protected function getNovel($novel){

        return 'Iam the author of '.$novel;
       }
}
