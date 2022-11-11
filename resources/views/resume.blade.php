@extends('layouts.mainLayout')

@section('title')
{{$title}}
@endsection
@section('content')
<div class="leftcol"><!--**************Основное содержание страницы************-->
    <div class="pinline1">
        <img class="pic" src="{{ asset('img/'. $resume->image)}}">
    </div>
    <p class="pinline second">
        {{$resume->FIO}}
        <br>
        Телефон:
        {{$resume->phone}}
    </p>
    <p class="pinline third">
        {{$resume->staff}}
        <br>
        Стаж:
        {{$resume->stage}}
    </p>
</div>

@endsection

