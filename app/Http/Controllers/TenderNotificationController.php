<?php

namespace App\Http\Controllers;

use App\notification;
use Illuminate\Http\Request;
use App\TenderNotification;

class TenderNotificationController extends Controller
{
    //
    public function insertNotification(Request $request){
        $notification =  new TenderNotification();
        $notification -> email = $request->input('email');
        $notification -> title = $request->input('title');
        $notification -> tender_id = $request->input('tender_id');
        $notification -> closing_date = $request->input('closing_date');
        $notification -> save();
        return response()->json([
            'message' => 'Notification added successfully'
        ], 200);;
    }

    public function fetchUsersNotification($email){
        return TenderNotification::where('email',$email)->get();
    }
}
