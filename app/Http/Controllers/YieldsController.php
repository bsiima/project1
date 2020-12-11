<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yields;

class YieldsController extends Controller
{
    public function __construct(){
        $this->authenticated_user = new AuthenticatedController;
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
        }if(empty(request()->income)){
            return redirect()->back()->withErrors("Please enter the income");
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
        $yield_obj->income          = request()->income;
        $yield_obj->user_id         = $this->authenticated_user->getLoggedInUserId();
        $yield_obj->save();
        return redirect()->back()->with('msg','Your operation to create a new yield was successful');
    }

    /**
     * This function gets the Yield
     */
    protected function getFarmYields($farm_id){
        $farm_yields = Yields::where('user_id',$farm_id)->get();
        return $farm_yields;
    }
}
