<?php

namespace App\components;

use App\Models\Login_details;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\VarDumper\Dumper\esc;

class ChatHelper
{
    public function fetch_user_last_activity($user_id)
    {

        $last_activity = DB::table('login_details')
            ->where('user_id', $user_id)
            ->orderby('last_activity', 'DESC')->take(1)
            ->get('last_activity');

        return $last_activity;

    }

    public function fetch_user_chat_history($from_user_id, $to_user_id)
    {
        $query = DB::table('chat_message')
            ->where('from_user_id', $from_user_id)
            ->where('to_user_id', $to_user_id)
            ->where('to_user_id', $from_user_id)
            ->orWhere('from_user_id', $to_user_id)
            ->orderBy('timestamp', 'DESC')
            ->get();

            return response()->json($query, 200);
    }
}

