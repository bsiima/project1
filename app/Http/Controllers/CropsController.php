<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crop;

class CropsController extends Controller
{

    public function __construct(){
        $this->authenticated_user = new AuthenticatedController;
    }
    /**
     * This function validates the crops request
     */
    protected function validateCropsRequest(){
        if(empty(request()->crop_name)){
            return redirect()->back()->withErrors('Please enter the crop name to proceed');
        }
        if(empty(request()->crop_price)){
            return redirect()->back()->withErrors('Please enter the crop price to proceed');
        }if(empty(request()->min_threshold)){
            return redirect()->back()->withErrors('Please enter the minimum threshold to proceed');
        }if(empty(request()->max_threshold)){
            return redirect()->back()->withErrors('Please enter the maximum threshold to proceed');
        }else{
            return $this->addNewCrop();
        }
    }

    /**
     * This function creates the crops
     */
    private function addNewCrop(){
        $crop_obj = new Crop;
        $crop_obj->crop_name     = request()->crop_name;
        $crop_obj->crop_price    = request()->crop_price;
        $crop_obj->min_threshold = request()->min_threshold;
        $crop_obj->max_threshold = request()->max_threshold;
        $crop_obj->created_by    = $this->authenticated_user->getLoggedInUserId();
        $crop_obj->save();

        return redirect()->back()->with('msg','New crop has been created successfully');
    }

    /**
     * This function edits the name of the crop
     */
    protected function editCrop($crop_id){
        Crop::where('id',$crop_id)->update(array(
            'crop_name'     => request()->crop_name,
            'crop_price'    => request()->crop_price,
            'min_threshold' => request()->min_threshold,
            'max_threshold' => request()->max_threshold,
            'updated_by'    => $this->authenticated_user->getLoggedInUserId()
        ));

        return redirect()->back()->with('msg','Your operation to edit the crop was successful');
    }

    /**
     * This function gets the crops
     */
    protected function getCrops($user_id){
        $farm_crops = Crops::where('user_id',$user_id)->get();
        return $farm_crops;
    }
}
