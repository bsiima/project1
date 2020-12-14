<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;

class EquipmentsController extends Controller
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
        }else{
            return $this->createEquipment();
        }
    }

    /**
     * This function creates the equipment
     */
    private function createEquipment(){
        $equipment_obj = new Equipment;
        $equipment_obj->equipment_name       = request()->equipment_name;
        $equipment_obj->price                = request()->price;
        $equipment_obj->description          = request()->description;
        $equipment_obj->number_of_equipments = request()->number_of_equipments;
        $equipment_obj->save();
        return redirect()->back()->with('msg','A new equipment has been created');
    }

    /**
     * This function edits an equipment
     */
    protected function editEQuipment($equipment_id){
        $equipment_obj = new Equipment;
        $equipment_obj->equipment_name       = request()->equipment_name;
        $equipment_obj->price                = request()->price;
        $equipment_obj->description          = request()->description;
        $equipment_obj->number_of_equipments = request()->number_of_equipments;

        Equipment::where('id',$equipment_id)->update($equipment_obj);
        return redirect()->back()->with('msg','Your operation to edit an equipment was successfully');
    }

    /**
     * This function deletes an equipment
     */
    protected function deleteEquipment($equipment_id){
        Equipment::find($equipment_id)->delete();
        return redirect()->back()->with('msg','Your operation to delete an item was successful');
    }
}
