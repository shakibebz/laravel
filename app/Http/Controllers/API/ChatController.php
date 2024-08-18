<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use App\components\ChatHelper;

class ChatController extends Controller
{
    /**
     * Display user's last activity
     */
    public function last_activity(Request $request)
    {
        $user_id = $request->user()->id;

        $chatHelper =new ChatHelper;
        $user_last_activity = $chatHelper->fetch_user_last_activity($user_id);
        return response()->json($user_last_activity, 200);
    }

    /**
     * Show the chat history for every single user.
     */
    public function history(Request $request)
    {
        $from_user_id= $request->user()->id;
        $to_user_id= $request->to_user_id;
        $chatHelper =new ChatHelper;
        $user_history = $chatHelper->fetch_user_chat_history($from_user_id, $to_user_id);
        return response()->json($user_history, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $chat = new Chat();
        $chat->to_user_id = $request->to_user_id;
        $chat->from_user_id = $request->from_user_id;
        $chat->chat_message = $request->chat_message;
        $chat->status = $request->status;

        $chat->save();

        return response()->json($chat, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
