@extends('layouts.mainLayout')

@section('title')
{{$title}}
@endsection

@section('content')
    <div class="leftcol"><!--**************Основное содержание страницы************-->
        <ul class="menu">
            <li><a href="task2/peoplestage">Фамилии персон, имеющих стаж от 5 до 15 лет.</a></li>
            <li><a href="task2/programmers">Фамилии и стаж людей с профессией Программист</a></li>
            <li><a href="task2/count">Общее число резюме в базе</a></li>
            <li><a href="task2/resumestaff">Профессии, представители которых имеются в резюме</a></li>

        </ul>
    </div>
@endsection
