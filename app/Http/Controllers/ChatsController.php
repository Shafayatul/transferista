<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
      $user = Auth::user();
    
      $message = $user->messages()->create([
        'message' => $request->input('message')
      ]);
   
      broadcast(new MessageSent($user, $message))->toOthers();
    
    
      return ['status' => 'Message Sent!'];
    }

}
