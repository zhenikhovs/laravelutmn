@extends('layouts.mainLayout')

@section('title')
{{$title}}
@endsection

@section('content')
<div class="leftcol"><!--**************Основное содержание страницы************-->
    <h1>{{$header}}</h1>
    <div class="resumes">
        @foreach($resumes as $resume)
            <a href="/resume/{{ $resume['id'] }}">
                <div class="resume">
                    <p class="pinline second">
                        {{ $resume['FIO'] }}<br>
                        Телефон: {{ $resume['phone'] }}
                    </p>
                    <p class="pinline third">
                        Стаж:
                        {{ $resume['stage'] }}
                    </p>
                </div>
            </a>


        @endforeach
    </div>


</div>
@endsection
