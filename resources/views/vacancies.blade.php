@extends('layouts.mainLayout')

@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="leftcol"><!--**************Основное содержание страницы************-->
        <h1>{{$header}}</h1>
        <div class="resumes">
            @foreach($vacancies as $vacancy)
                <div class="resume">
                    <p class="pinline second">
                        Должность: {{ $vacancy['staff'] }}<br>
                        Название фирмы : {{ $vacancy['name'] }}
                    </p>
                    <p class="pinline third">
                        Адрес:
                        {{ $vacancy['address'] }}
                    </p>
                </div>



            @endforeach
        </div>


    </div>
@endsection
