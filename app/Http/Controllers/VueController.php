<?php

namespace App\Http\Controllers;

use App\Events\MessageEcho;
use App\Events\NewMessage;
use App\Events\PrivateChat;
use App\Events\PrivateEchoChat;
use App\Events\RealTimeChartEvent;
use App\Room;
use App\User;
use Illuminate\Http\Request;
use Auth;
class VueController extends Controller
{
    public function uploadFileIndex(){
        return view('vue.image-upload');
    }
    public function uploadFile(Request $request){
        $path = $request->file('image')->store('uploads','public');
        return view('vue.image-upload',compact('path'));
    }
    public function sendDataIndex(Request $request){
        return view('vue.sendData',['data'=>Auth::user(),'array'=>User::all()]);
    }
    public function sendDataAjaxIndex(){
        return view('vue.sendAjaxData');
    }
    public function sendDataAjax(){
        return $array =[
            array(
                'title' => 'Гугл',
                'url' => 'http://google.com'
            ),
            array(
            'title' => 'Яндекс',
            'url' => 'http://yandex.ru'
        ),
            array(
                'title' => 'Мэил',
                'url' => 'http://mail.ru'
            )
        ];
    }
    public function chartAjaxIndex(){
        return view('vue.lineChart');
    }
    public function chartAjax(){
        return [
            'labels' => ['март', 'апрель', 'май', 'июнь'],
            'datasets' => array([
                'label' => 'Продажи',
                'backgroundColor' => '#F26202',
                'data' =>[15000,5000,10000,30000]
            ])
        ];
    }
    public function chartSocket(){
        return view('vue.realTimeChart');
    }
    public function newEvent(Request $request){
        $result = [
            'labels' => ['март', 'апрель', 'май', 'июнь'],
            'datasets' => array([
                'label' => 'Продажи',
                'backgroundColor' => '#F26202',
                'data' =>[15000,5000,10000,30000]
            ])
        ];
        if($request->has('label')){
            $result['labels'][] = $request->input('label');
            $result['datasets'][0]['data'][] = (integer)$request->input('data');
            if($request->has('realtime')){;
                if(filter_var($request->input('realtime'), FILTER_VALIDATE_BOOLEAN)){
                    event(new RealTimeChartEvent($result));
                }

            }
        }
        return $result;
    }
    public function chatIndex(){
        return view('vue.chat');
    }
    public function chatMessage(Request $request){
        event(new NewMessage($request->login, $request->message));
    }
    public function privateChat(){
        return view('vue.privateChat');
    }
    public function getUsers(){
        return User::all();
    }
    public function privateChatMessage(Request $request){
        PrivateChat::dispatch($request->all());
        return $request->all();
    }
    public function chatEcho(){
        return view('vue.chatEcho');
    }
    public function chatEchoSend(Request $request){
        MessageEcho::dispatcH($request->input('message'));
//        event(new MessageEcho($request->input('message')));
    }


    public function privateEchoChat(){
        return view('vue.privateEchoChat');
    }
    public function privateEchoSend(Request $request){
        event(new PrivateEchoChat($request->all()));
    }
    public function room(Room $room){
        return view('vue.room',['room'=>$room]);
    }
}
