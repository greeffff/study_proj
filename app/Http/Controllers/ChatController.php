<?php

namespace App\Http\Controllers;

use App\Events\EventMessager;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Auth,DB;
class ChatController extends Controller
{
    public function index(){
        return view('Chats.index');
    }
    public function contacts(){
        $contacts = User::where('id','!=',Auth::user()->id)->get();
        $unreadIds = Message::select(DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to',Auth::user()->id)
            ->where('unread',false)
            ->groupBy('from')
            ->get();
        $contacts = $contacts->map(function ($q) use($unreadIds){
           $contactUnread = $unreadIds->where('sender_id',$q->id)->first();
           $q->unread = $contactUnread ? $contactUnread->messages_count : 0;
           return $q;
        });
        return response()->json($contacts);
    }
    public function messages($id){
        Message::where('from', $id)->orWhere('to',Auth::user()->id)->update(['unread'=>1]);
        $messages = Message::where('from', $id)->orWhere('to',$id)->get();
        return $messages;
    }
    public function send(Request $request){
        $message = Message::create([
            'from' => Auth::user()->id,
            'to'=>$request->contact_id,
            'text'=>$request->text,
        ]);
        event(new EventMessager($message));
        return response()->json($message);
    }
}
