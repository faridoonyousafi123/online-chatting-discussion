<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Events\ChatEvents;

class ChatController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function chat() {

        return view('chatting');

    }

    public function send(Request $request) {

        // return $request->all();
        $user = User::find(Auth::id());

        event(new ChatEvents($request->message, $user));
    }

//     public function send() {

//         $user = User::find(Auth::id());
//         $message = 'Hoooooooooeeee';
//         event(new ChatEvents($message, $user));
//     }
}
