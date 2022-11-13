@extends('layouts.mainLayout')

@section('title')
{{$title}}
@endsection

@section('content')
<div class="leftcol"><!--**************Основное содержание страницы************-->

    <div class="resumes_header">
        <h1>{{$header}}</h1>
        <a href="/resume/add">
            <button class="add_btn" >Добавить резюме</button>
        </a>
    </div>
    <div class="resumes">
        @foreach($resumes as $resume)
            <a href="/resume/{{ $resume['id'] }}">
                <div class="resume">
                    <div class="pinline second">
                        {{ $resume['FIO'] }}<br>
                        Телефон: {{ $resume['phone'] }}
                    </div>
                    <div class="resume_second_line">
                        <div class="pinline third">
                            Стаж:
                            {{ $resume['stage'] }}
                        </div>
                        <div class="actions">
{{--                            <a href="/lala">--}}
{{--                                <img src="{{ asset('img/upd.png')}}" alt="">--}}
{{--                            </a>--}}
{{--                            <a href="/lslslsa">--}}
{{--                                <img src="{{ asset('img/trash.png')}}" alt="">--}}
{{--                            </a>--}}
                        </div>

                    </div>

                </div>
            </a>


        @endforeach
    </div>

</div>
@endsection
