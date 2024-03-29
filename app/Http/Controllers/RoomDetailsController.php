<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomDetail;
use Illuminate\Support\Facades\DB;

class RoomDetailsController extends Controller
{
    public function uploadDetails()
    {
        $insert = RoomDetail::create(['room_category'=>request('room_category'), 'price'=>request('price'), 'numOf_available_rooms'=>request('numOf_available_rooms'), 'roomPic'=>$_FILES['roomPic']['name']]);
        if ($insert) {
            move_uploaded_file($_FILES['roomPic']['tmp_name'], 'C:\Users\DELL\Desktop\Angular Projects\hotel-app\src\assets\images\\'. $_FILES['roomPic']['name']);
            return response()->json('Details Uploaded');
        }
        else{
            return response()->json('Xampp Error', 200);
        }
    }
    public function getRoomDetails()
    {
        $allRoomDetails = RoomDetail::get();
        return response()->json($allRoomDetails);
    }
    public function deleteRoom()
    {
        $deleteRoom = DB::delete('delete from room_details where details_id = ?', [request('id')]);
        if($deleteRoom){
            return response()->json('Success', 200);
        }
        return response()->json(request('id'));
    }
}
