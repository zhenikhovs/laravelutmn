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
        @forelse($resumes as $resume)

                <div class="resume">
                    <a href="/resume/{{ $resume['id'] }}">
                        <div class="pinline second">
                            {{ $resume['FIO'] }}<br>
                            Телефон: {{ $resume['phone'] }}
                        </div>
                    </a>

                    <div class="resume_second_line">
                        <div class="pinline third">
                            Стаж:
                            {{ $resume['stage'] }}
                        </div>
                        <div class="actions">
                            <a href="{{ route('UpdateResumeForm',['id'=>$resume['id']]) }}">
                                <img src="{{ asset('img/upd.png')}}" alt="">
                            </a>
                            <form action=
                                      "{{ route('DeleteResume',['person'=>$resume['id']]) }}" method="POST">
                                @method('DELETE')
                                <button class="trash_btn" type="submit"><img src="{{ asset('img/trash.png')}}" alt=""></button>
                                {{ csrf_field() }}
                            </form>
                        </div>

                    </div>

                </div>
        @empty
            Таких индивидуумов нет :( <br>
            Очень грустно даже плакать хочется

        @endforelse
    </div>

</div>
@endsection
