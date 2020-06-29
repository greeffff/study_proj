@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                Используется:<br> npm i -g laravel-echo-server<br>
                npm i --save laravel echo socket.io-client<br>
                Необходимо: config/app.php -> Рассхометировать BroadcastServiceProvider
                (чтобы работали каналы)
            </div>
        </div>
    </div>
    <chat-echo></chat-echo>
@endsection
