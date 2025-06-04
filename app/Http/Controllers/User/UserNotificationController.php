<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserNotificationController extends Controller
{
    public function index(){
        $notifications = Auth::user()->notifications()->latest()->get();

        return view('pages.app.notification.index', compact('notifications'));
    }
}
