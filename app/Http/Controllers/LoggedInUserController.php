<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class LoggedInUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt');
        \Cloudinary::config([
            "cloud_name" => "ololadedavid15",
            "api_key" => "693129952828152",
            "api_secret" => "WIh0n7eDm3wejhDYzjYsfxQbTpI",
            "secure" => true]);
    }
    public function editProfile()
    {
        if($_FILES){
            $user = User::find(auth()->user()->user_id);
            \Cloudinary\Uploader::upload(
                "https://upload.wikimedia.org/wikipedia/commons/a/ae/Olympic_flag.jpg",
                ["public_id" => "olympic_flag"]
            );
            $user->profilePic = $_FILES['userPic']['name'];
            // $updatePic = $user->save();
            // if($updatePic){
                // move_uploaded_file($_FILES['userPic']['tmp_name'], 'C:\Users\DELL\Desktop\Angular Class\hotel-app\src\assets\images\\'. $_FILES['userPic']['name']);
                return response()->json('Updated');
            // }
            // return response()->json('File Upload Error');
        }
        else{
            return response()->json('The server cannot process your request');
        }
    }
}
