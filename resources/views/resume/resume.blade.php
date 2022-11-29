@extends('layouts.mainLayout')

@section('title')
{{$title}}
@endsection
@section('content')
<div class="leftcol"><!--**************Основное содержание страницы************-->
    <div class="resume_content">
        @if($resume)
        <div class="">
            <img class="pic" src="{{ asset('img/'. $resume->image) }}">
        </div>
        <div class=" second">
            {{$resume->FIO}}
            <br>
            Телефон:
            {{$resume->phone}}
        </div>
        <div class=" third">
            {{$resume->staff}}
            <br>
            Стаж:
            {{$resume->stage}}
        </div>
        <div class="resume_btns">
            <a href="{{ route('UpdateResumeForm',['id'=>$resume->id]) }}" >
                <button class="update_btn" type="submit">Изменить резюме</button>
            </a>

            <form action=
                      "{{ route('DeleteResume',['person'=>$resume->id]) }}" method="POST">
                @method('DELETE')
                <button class="remove_btn" type="submit">Удалить резюме</button>
                {{ csrf_field() }}
            </form>
        </div>
        @else
            Такого индивидуума нет :( <br>
            очень грустно, даже плакать хочется
        @endif
    </div>



</div>

@endsection

