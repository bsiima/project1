<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yields;
use App\Crop;

class YieldsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->authenticated_user = new AuthenticatedController;
    }
    /**
     * This function gets the Add yields page
     *
     * @return void
     */
    protected function addYieldsPage(){
        return view('admin.add_yields');
    }
    /**
     * This function validates the yield
     */
    protected function validateYield(){
        if(empty(request()->yield_name)){
            return redirect()->back()->withErrors("Please enter the yield name");
        }if(empty(request()->number_of_bags)){
            return redirect()->back()->withErrors("Please enter the number of bags");
        }if(empty(request()->weight)){
            return redirect()->back()->withErrors("Please enter the weight");
        }else{
            return $this->createYield();
        }
    }

    /**
     * This function creates the yield
     */
    private function createYield(){
        $yield_obj = new Yields;
        $yield_obj->yield_name      = request()->yield_name;
        $yield_obj->number_of_bags  = request()->number_of_bags;
        $yield_obj->weight          = request()->weight;
        $yield_obj->price          = request()->price;
        $yield_obj->crop_id         = $this->getCropId();
        $yield_obj->user_id         = $this->authenticated_user->getLoggedInUserId();
        $yield_obj->save();
        return redirect()->back()->with('msg','Your operation to create a new yield was successful');
    }

    protected function getYields(){
        $all_yields = $this->getFarmYields();
        return view('admin.yields',compact('all_yields'));
    }
    /**
     * This function gets the Yield
     */
    protected function getFarmYields(){
        $farm_yields = Yields::get();
        return $farm_yields;
    }

    /**
     * This function gets the crop id for the loggedin farm
     */
    private function getCropId(){
        return Crop::where('created_by',$this->authenticated_user->getLoggedInUserId())->value('id');
    }
}
