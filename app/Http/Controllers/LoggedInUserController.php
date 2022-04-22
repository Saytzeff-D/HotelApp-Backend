<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoggedInUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt');
    }
    public function editProfile()
    {
        if($_FILES){
            $user = User::find(auth()->user()->user_id);
            $user->profilePic = $_FILES['userPic']['name'];
            $updatePic = $user->save();
            if($updatePic){
                move_uploaded_file($_FILES['userPic']['tmp_name'], 'C:\Users\DELL\Desktop\Angular Class\hotel-app\src\assets\images\\'. $_FILES['userPic']['name']);
                return response()->json('Updated');
            }
            return response()->json('File Upload Error');
        }
        else{
            return response()->json('The server cannot process your request');
        }
    }
}
