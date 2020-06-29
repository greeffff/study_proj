@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="display: inline-block">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        {{--                    @if (session('status'))--}}
                        {{--                        <div class="alert alert-success" role="alert">--}}
                        {{--                            {{ session('status') }}--}}
                        {{--                        </div>--}}
                        {{--                    @endif--}}

                        {{--                    You are logged in!--}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div style="border: 1px solid black">
                                    <div class="card-header">
                                        Очереди (Jobs, queue)
                                    </div>
                                    <div class="card-body">
                                        <a href="{{route('queue.send_to_log')}}" class="btn btn-primary custom-btn">Просто очередь</a>
                                        <div class="" style="display: inline-block">
                                            <a href="{{route('queue.send_to_log_many')}}" class="btn btn-primary custom-btn">Очередь с обработчиком ошибок + несколько заданий</a>
                                            <button class="btn btn-success custom-btn" style="" data-toggle="collapse" href="#queue" role="button" aria-expanded="false" aria-controls="queue">></button>
                                        </div>
                                        <div class="collapse" id="queue">
                                            <div class="card card-body">
                                                php artisan queue:failed - задания с ошибками<br>
                                                php artisan queue:retry {id} - выполнить задачу с {id}<br>
                                                php artisan queue:retry all - выполнить все завершенные задачи<br>
                                                php artisan queue:forget {id} - убрать заверешнную задачу <br>
                                                php artisan queue:flush - очистить таблицу <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="border: 1px solid black">
                                    <div class="card-header">
                                        Фильтрация
                                    </div>
                                    <div class="card-body">
                                        <a href="{{route('filter.abstruct_filter')}}" class="btn btn-primary custom-btn">Фильтр с максимальной асбтракцией</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div style="border: 1px solid black">
                                    <div class="card-header">
                                        VUE
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-8">
                                        <a class="btn btn-primary custom-btn" href="{{route('vue.uploadFileIndex')}}">Загрузка файлов</a>
                                        <a class="btn btn-primary custom-btn" href="{{route('vue.sendDataIndex')}}">Передача данных из Blade</a>
                                        <a class="btn btn-primary custom-btn" href="{{route('vue.sendDataAjaxIndex')}}">Получение данных через Ajax</a>
                                        <a class="btn btn-primary custom-btn" href="{{route('vue.chartAjaxIndex')}}">ChartJs через Ajax</a>
                                        <a class="btn btn-primary custom-btn" href="{{route('vue.chartSocketIndex')}}">Realtime ChartJsx</a>
                                        <a class="btn btn-primary custom-btn" href="{{route('vue.allChatIndex')}}">Чат для всех</a>
                                        <a class="btn btn-primary custom-btn" href="{{route('vue.privateChat')}}">Приватный чат</a>
                                        <a class="btn btn-primary custom-btn" href="{{route('vue.chatEcho')}}">Общий ECHO чат</a>
                                        <a class="btn btn-primary custom-btn" href="{{route('vue.privateEchoChat')}}">Приватный ECHO чат</a>
                                            <a class="btn btn-primary custom-btn" href="{{route('vue.private-room',['room'=>1])}}">Приватный ECHO чат (room 1)</a>
                                            <a class="btn btn-primary custom-btn" href="{{route('vue.private-room',['room'=>2])}}">Приватный ECHO чат (room 2)</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div style="border: 1px solid black">
                                <div class="card-header">
                                    Чаты
                                </div>
                                <div class="card-body">
                                    <div class="col-md-8">
                                        <a class="btn btn-primary custom-btn" href="{{route('chat.index')}}">We Code Messager</a>
                                </div>
                                </div>
                            </div>
                        </div>

                        {{--                    <div class="col-lg-3">--}}

                        {{--                    </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
