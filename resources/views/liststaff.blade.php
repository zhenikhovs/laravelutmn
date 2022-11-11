@extends('layouts.mainLayout')

@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="leftcol"><!--**************Основное содержание страницы************-->
        <h1>{{$header}}</h1>
        <div class="staff">
            @foreach($staff as $staffEl)
                <a href="/staff/{{$staffEl['staff']}}">
                    {{$staffEl['staff']}}
                </a>
            @endforeach
        </div>


    </div>
@endsection
