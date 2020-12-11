<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TankSensor;

class TankSensorController extends Controller
{
    //declaring the value of pi
    protected static $pi = 3.14;

    public function __construct(){
        $this->authenticated_user = new AuthenticatedController;
    }
    
    /**
     * This function validates the water level
     * the water level is the height of water
     */
    protected function validateWaterLevel(){
        $tank_radius = request()->tank_radius;
        $tank_height = request()->tank_height; //full height of the tank
        $water_level = request()->water_level; //height of water in the tank
        if(empty($tank_radius)){
            $tank_radius = Radii::where('user_id',$this->authenticated_user->getMyTankRadius());
            if(empty($tank_radius)){
                return response()->json('Please enter the tank radius to proceed');
            }
        }
        if(empty($tank_height)){
            $tank_height = Radii::where('user_id',$this->authenticated_user->getMyTankHeight());
            if(empty($tank_height)){
                return response()->json('Please enter the tank height to proceed');
            }
        }
        if(empty($water_level)){
            $water_level = 0;
        }
        return $this->recordTheWaterLevel($water_level, $tank_height, $tank_radius);
    }

    /**
     * This function calculates the volume of water
     */
    private function calculateVolumeOfWater($water_level, $tank_height, $tank_radius){
        $volume = Self::$pi * ($tank_radius * $tank_radius) * ($tank_height - $water_level);
        return $volume;
    }

    /**
     * This function saves the water level
     */
    private function recordTheWaterLevel($water_level, $tank_height, $tank_radius){
        $water_level_obj = new TankSensor;
        $water_level_obj->water_volume = $this->calculateVolumeOfWater($water_level, $tank_height, $tank_radius);
        $water_level_obj->save();
        return response()->json(['message' => 'water level has been saved successfully']);
    }
}
