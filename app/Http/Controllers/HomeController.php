<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count_yileds = $this->countNoOfYields();
        $count_sensor_records = $this->countSensorRecords();
        $count_equip = $this->countEquipment();
        $count_users= $this->countUsers();
        $temperature_readings = $this->temepratureReadingPerMonth();
        $moisture_readings = $this->moistureReadingPerMonth();
        return view('admin.dashboard',compact('count_yileds','count_sensor_records','count_equip','count_users','temperature_readings','moisture_readings'));
    }
// this function is used to fetch and count temperature records
    private function temepratureReadingPerMonth(){
        $months_array = [1,2,3,4,5,6,7,8,9,10,11,12];
        $temperature_array = [];
        $countof_temperature_in_this_month = [];
        for($i=0; $i<count($months_array); $i++){
            $temperature_readings_for_this_year = DB::table('sensors')->whereMonth('created_at',$months_array[$i])->sum('temperature_reading');
            $count_times_in_a_month = DB::table('sensors')->whereMonth('created_at',$months_array[$i])->count();
            if($count_times_in_a_month == 0){
                $count_times_in_a_month = 1;
            }
            array_push($temperature_array, $temperature_readings_for_this_year/$count_times_in_a_month);
        }
        return json_encode($temperature_array);
    }
// 
    private function MoistureReadingPerMonth(){
        $months_array = [1,2,3,4,5,6,7,8,9,10,11,12];
        $moisture_array = [];
        $countof_moisture_in_this_month = [];
        for($i=0; $i<count($months_array); $i++){
            $moisture_readings_for_this_year = DB::table('sensors')->whereMonth('created_at',$months_array[$i])->sum('moisture_reading');
            $count_times_in_a_month = DB::table('sensors')->whereMonth('created_at',$months_array[$i])->count();
            if($count_times_in_a_month == 0){
                $count_times_in_a_month = 1;
            }
            array_push($moisture_array, $moisture_readings_for_this_year/$count_times_in_a_month);
        }
        return json_encode($moisture_array);
    }
    /**
     * This function logs out a user
     */
    protected function logMeOut(){
        Auth::logout();
        return redirect('/login');
    }

    private function countNoOfYields(){
        return DB::table('yields')->count();
    }
    private function countSensorRecords(){
        return DB::table('sensors')->count();
    }
    private function countEquipment(){
        return DB::table('equipment')->count();
    }
    private function countUsers(){
        return DB::table('users')->count();
    }
}
