<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\notification;
use App\User;

class NotificationController extends Controller
{
    //
    public function insertNotification(Request $request){
        $notification =  new notification();
        $notification -> email = $request->input('email');
        $notification -> title = $request->input('title');
        $notification -> job_id = $request->input('job_id');
        $notification -> closing_date = $request->input('closing_date');
        $notification -> save();
        return response()->json($notification);
    }

    public function fetchUsersNotification($email){
        return notification::where('email',$email)->get();
    }

    public function fetchUser($email){
        return user::where('email',$email)->get();
    }

    public function  deleteNotification($id,$email){

        return notification::where('id',$id)->where('email',$email)->delete();
    }
}
