<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function __construct(){
        $this->authenticated_user = new AuthenticatedController;
    }
    /**
     * This function validates the add user request
     */
    protected function addUserPage(){
        return view('admin.add_user');


    }
    protected function validateUserRequest(){
      
        if(empty(request()->name)){
            return redirect()->back()->withErrors('Please enter full name to proceed');
        }
        if(empty(request()->email)){
            return redirect()->back()->withErrors('Please enter the email to proceed');
        }if(empty(request()->password)){
            return redirect()->back()->withErrors('Please enter the Password to proceed');
        }else{
            return $this->addNewUser();
        }
    }

    /**
     * This function creates the Users
     */
    private function addNewUser(){
        
        $user_obj = new User;
        $user_obj->name     = request()->name;
        $user_obj->email = request()->email;
        $user_obj->password = request()->password;
        // $user_obj->created_by    = $this->authenticated_user->getLoggedInUserId();
        // $User_obj->updated_by    = $this->authenticated_user->getLoggedInUserId();
        $user_obj->save();

        return redirect()->back()->with('msg','New User has been created successfully');
    }

    /**
     * This function edits the name of the User
     */
    protected function editUser($user_id){
        User::where('id',$user_id)->update(array(
            'name'     => request()->name,
            'email' => request()->email,
            'password' => request()->password,
            'updated_by'    => $this->authenticated_user->getLoggedInUserId()
        ));

        return redirect()->back()->with('msg','Your operation to edit the User was successful');
    }

    /**
     * This function gets the Users
     */
    protected function getUsers(){
        $registered_Users = User::get();
        return $registered_Users;
    }

    protected function viewUsers(){
        $all_Users = $this->getUsers();
       return view('admin.view_user',compact('all_Users'));

   }

    
}
