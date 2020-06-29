@extends('layouts.app')
@section('content')
    @if(Auth::check())
        <private-chat :user="{{Auth::user()}}"></private-chat>
    @else
        Зарегестрируйтесь
    @endif
@endsection
