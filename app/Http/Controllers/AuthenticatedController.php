<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TankSensor;

class AuthenticatedController extends Controller
{

    /**
     * This functions gets the loggedin user Id
     */
    public function getLoggedInUserId(){
        return  auth()->user()->id;
    }
    /**
     * This function gets the tank radius for a loggedIn user
     */
    public function getMyTankRadius(){
        $my_tank_radius = TankSensor::where('created_by',$this->getLoggedInUserId())->value('tank_radius');
        return $my_tank_radius;
    }

    /**
     * This function gets the tank height for a loggedIn user
     */
    public function getMyTankHeight(){
        $my_tank_height = TankSensor::where('created_by',$this->getLoggedInUserId())->value('tank_height');
        return $my_tank_height;
    }
}
