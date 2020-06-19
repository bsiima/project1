<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class school extends Controller
{
    protected function getSchoolName($school){

        return 'I went to '.$school;
       
    }
}



