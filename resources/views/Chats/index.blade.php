@extends('layouts.app')
@section('content')



    <div class="col-md-12">
        <div class="card">
            <div class="card-header">We Code Message</div>
            <div class="card-body">
                <we-code-message :user="{{Auth::user()}}">

                </we-code-message>
            </div>
        </div>
    </div>
@endsection
