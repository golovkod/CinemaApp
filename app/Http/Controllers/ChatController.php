<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * ChatController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('chat');
    }

    /**
     * @return Collection
     */
    public function fetchAllMessages()
    {
        return Chat::with('user')->get();
    }

    /**
     * @param Request $request
     * @return string[]
     */
    public function sendMessage(Request $request)
    {
        $chat = auth()->user()->messages()->create([
            'message' => $request->message
        ]);
        broadcast(new ChatEvent($chat->load('user')))->toOthers();
        return ['status' => 'success'];
    }
}
