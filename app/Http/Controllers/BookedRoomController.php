<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomDetail;
use App\Models\BookedRoom;
use Illuminate\Support\Facades\DB;

class BookedRoomController extends Controller
{
    public $myRoom;
    // public $myRoom = RoomDetail::where('room_category', request('roomCategory'))->get();
    public function __construct()
    {
        $this->middleware('jwt', ['except'=>['checkRoom', 'allBookings', 'verifyPayment']]);
        $this->myRoom = RoomDetail::where('room_category', request('roomCategory'))->get();
    }
    public function checkRoom()
    {
        $check = ($this->myRoom[0]->numOf_available_rooms > request('numOfRooms')) ? 'Checked' : 'Not Available';
        return response()->json($check);
    }
    public function getRoomPrice()
    {
        return response()->json(['roomDetails'=>$this->myRoom[0], 'email'=>auth()->user()->email]);
    }
    public function payNow()
    {
        $payInfo = request()->all();
        $payInfo['user_id'] = auth()->user()->user_id;
        $numOfAvailableRooms = $this->myRoom[0]['numOf_available_rooms'];
        $updatedOne = $numOfAvailableRooms - request('numOfRooms');
        $update = DB::table('room_details')->where('room_category', request('roomCategory'))->update(['numOf_available_rooms'=>$updatedOne]);
        if ($update) {
            $createPayment = BookedRoom::create($payInfo);
            if ($createPayment) {
                return response()->json('Inserted');
            }
            return response()->json('Not Inserted');
        }
        return response()->json('Network Error');
    }
    public function transHistory()
    {
        $history = BookedRoom::where('user_id', auth()->user()->user_id)->get();
        return response()->json($history);
    }
    public function myVisits()
    {
        $visits = BookedRoom::where('user_id', auth()->user()->user_id)->get();
        return response()->json($visits);
    }
    public function allBookings()
    {
        $all = DB::select('select * from users join booked_rooms using(user_id)');
        return response()->json($all);
    }
    public function verifyPayment()
    {
        $payDetails = DB::select('select firstName, lastName, email, payment_ref, amount, roomCategory, payment_status from users join booked_rooms using(user_id) where payment_ref = ?', [request('paymentRef')]);
        return response()->json($payDetails);
    }
}
