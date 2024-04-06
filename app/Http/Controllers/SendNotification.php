<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notifications\OrderSend;
use Pusher\Pusher;
use Notification;

class SendNotification extends Controller
{
    public function sendToAdmin($data = [])
    {
        $getAdmin = User::whereRole(config('app.admin_role'))->get();
        Notification::send($getAdmin, new OrderSend($data));
        
       

       
    }
}
