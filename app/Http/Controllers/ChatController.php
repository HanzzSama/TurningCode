<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getChat()
    {
        return Chat::with(['sender','reply.sender'])
        ->orderBy('created_at', 'asc')
        ->get()
        ->map(function($chat){
            return [
                'id' => $chat->id,
                'message' => $chat->message,
                'sender_id' => $chat->sender_id,
                'sender' => $chat->sender,
                'reply' => $chat->reply,
                'created_at' => $chat->created_at->format('H:i') // 🔥 FIX TIME
            ];
        });
    }

    /**
     * Show the form for creating a new resource.
     */
    public function send(Request $request)
    {
        Chat::create([
            'sender_id' => auth()->id(),
            'message' => $request->message,
            'reply_id' => $request->reply_id
        ]);

        return response()->json(['status'=>'ok']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
