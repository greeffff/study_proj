@extends('layouts.app')
@section('content')
    @if(Auth::check())
        <private-echo-room :room="{{$room}}" :user="{{Auth::user()}}"></private-echo-room>
    @else
        Авторузуйтесь
    @endif
@endsection
