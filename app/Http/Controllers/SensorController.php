<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensor;

class SensorController extends Controller
{

    /**
     * This function validates the sensor readings
     */
    protected function validateSensorReading(){
        $moisture_reading    = request()->moisture_reading;
        $temperature_reading = request()->temperature_readings;
        //if the moisture reading is empty, moisture reading = previous reading
        if(empty($moisture_reading)){
            $moisture_reading = $this->getPreviousMoistureReading();
        }
        //if temperature reading is empty, temperature reading = previous reading
        if(empty($temperature_reading)){
            $temperature_reading = $this->getPreviousTemperatureReading();
        }
        return $this->recordSensor($moisture_reading, $temperature_reading);
    }

    /**
     * this function gets the previous temperature reading
     */
    private function getPreviousTemperatureReading(){
       $previous_temperature_reading = Sensor::where('id',$this->getMaximumId())->value('temperature_reading');
       if(empty($previous_temperature_reading)){
            $previous_temperature_reading = 0;
        }
        return $previous_temperature_reading;
    }

    /**
     * This function gets the previous moisture reading
    */
    private function getPreviousMoistureReading(){
        $previous_moisture_reading = Sensor::where('id',$this->getMaximumId())->value('moisture_reading');
        if(empty($previous_moisture_reading)){
            $previous_moisture_reading = 0;
        }
        return $previous_moisture_reading;
    }

    /**
     * This function records the moisture value as it comes from 
     * hardware
     */
    private function recordSensor($moisture_reading, $temperature_reading){
        $sensor_reading_obj = new Sensor;
        $sensor_reading_obj->moisture_reading    = $moisture_reading;
        $sensor_reading_obj->temperature_reading = $temperature_reading;
        $sensor_reading_obj->save();

        return response()->json(['message' => 'New reading has been created successfully']);
    }

    /**
     * This function gets the maximum id
     */
    private function getMaximumId(){
        $max_id = Sensor::get()->Max('id');
        return $max_id;
    }

    protected function fetchSensorReadings(){
        $sensor_readings = $this->getReadings();
        return view('admin.sensor_view',compact('sensor_readings'));
 

    }
    protected function getReadings(){
        $sensorValues = Sensor::get();
        return $sensorValues;
    }

   

}
