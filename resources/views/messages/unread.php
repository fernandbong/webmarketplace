<?php

use App\Message;
use Illuminate\Support\Facades\DB;

$inbox = Message::select(DB::raw('count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('is_read', false)
            ->first();

echo $inbox->messages_count;

?>
