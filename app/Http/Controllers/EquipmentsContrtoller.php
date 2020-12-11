<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipmentsContrtoller extends Controller
{
    /**
     * This function validates the equipments
     */
    protected function validateEquipment(){
        if(empty(request()->equipment_name)){
            return redirect()->back()->withErrors("Please enter the name Equipment to proceed");
        }if(empty(request()->number_of_equipments)){
            return redirect()->back()->withErrors("Please enter the number of equipments to proceed");
        }
        if(empty(request()->price)){
            return redirect()->back()->withErrors("Please enter the price to proceed");
        }
        if(empty(request()->description)){
            return redirect()->back()->withErrors("Please enter the description to proceed");
        }
    }
}
