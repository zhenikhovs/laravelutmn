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
        <form method="POST" action="{{ route('UpdateResume',['person'=>$resume->id]) }}">
            <input type=hidden name="_method" value="PUT">
            <div>ФИО <input name="FIO" value="{{$resume->FIO}}"></div>
            <div>Телефон <input name="phone" value="{{$resume->phone}}"></div>
            <div>Фото <input name="image" value="{{$resume->image}}"></div>
            <div>Профессия
                <select name="staff_id">
                    @foreach($staff as $staffEl)
                        @if($resume->staff_id ==$staffEl['id'])
                        <option value="{{$staffEl['id']}}" selected>{{$staffEl['staff']}}</option>
                        @else
                            <option value="{{$staffEl['id']}}">{{$staffEl['staff']}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div>Стаж <input name="stage" min="0" type="number" value="{{$resume->stage}}"></div>
            <button class="add_btn" type="submit">Обновить резюме</button>
            {{ csrf_field() }}
        </form>
    </div>
@endsection
