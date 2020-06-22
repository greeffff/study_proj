@extends('layouts.app')
@section('content')
    <data-send :urldata="{{$data}}" :arraydata="{{$array}}"></data-send>
@endsection
