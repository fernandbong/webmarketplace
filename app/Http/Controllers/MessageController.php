<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Pusher\Pusher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        // tampilin user yg punya percakapan dgn login user, kecuali user yg login
        $user = Message::select('users.id', 'users.name', 'users.avatar', 'users.email')
                        ->leftJoin('users', function($join){
                            $join->on('users.id', '=', 'messages.from');
                            $join->orOn('users.id', '=', 'messages.to');
                        })
                        ->where('messages.from', auth()->id())
                        ->orWhere('messages.to', auth()->id())
                        ->groupBy('users.id', 'users.name', 'users.avatar', 'users.email')->get();
        $contacts = $user->where('id', '!=', auth()->id());

        // get a collection of items where sender_id is the user who sent us a message
        // and messages_count is the number of unread messages we have from him
        $unreadIds = Message::select(DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('is_read', false)
            ->groupBy('from')
            ->get();
        // add an unread key to each contact with the count of unread messages
        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });

        return view('inbox', ['users' => $contacts]);
    }

    public function getMessage($user_id)
    {
        $my_id = Auth::id();

        // ubah read dari pesan yg unread
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        // tampilin semua pesan dari selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get();

        return view('messages.index', ['messages' => $messages]);
    }

    public function firstMessage (Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $message = $request->message;

        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0; // pesan otomatis unread ketika pesan terkirim
        $data->save();

        return redirect()->route('inbox')->withMessage('Message sent!');
    }

    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0; // pesan otomatis unread ketika pesan terkirim
        $data->save();

        // pusher
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to' => $to]; // kirim untuk dan dari user id ketika pencet enter
        $pusher->trigger('my-channel', 'my-event', $data);
    }

}
