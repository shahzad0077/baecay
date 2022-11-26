<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

use App\Events\MessageSent;

class ChatsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }


    public function index()
    {
      return view('frontend.chat.chatroom');
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

      return ['status' => 'Message Sent!'];
    }
}
