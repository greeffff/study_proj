<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Auth;
class ChatController extends Controller
{
    public function index(){
        return view('Chats.index');
    }
    public function messages($id){
        $messages = Message::where('from', $id)->orWhere('to',$id)->get();
        return $messages;
    }
    public function send(Request $request){
        $message = Message::create([
            'from' => Auth::user()->id,
            'to'=>$request->contact_id,
            'text'=>$request->text,
        ]);
        return response()->json($message);
    }
}
