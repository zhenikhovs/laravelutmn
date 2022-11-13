@extends('layouts.mainLayout')
@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="leftcol">
        @if(count($errors)>0)
            <div class="errors">
                <ul> @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="">
            <div>ФИО <input name="FIO"></div>
            <div>Телефон <input name="phone" ></div>
            <div>Фото <input name="image" value="ava1.jpg"></div>
            <div>Профессия
                <select name="staff_id">
                    @foreach($staff as $staffEl)
                    <option value="{{$staffEl['id']}}">{{$staffEl['staff']}}</option>
                    @endforeach
                </select>
            </div>

            <div>Стаж <input name="stage" min="0" type="number"></div>
            <button class="add_btn" type="submit">Добавить резюме</button>
            {{ csrf_field() }}
        </form>
    </div>
@endsection
