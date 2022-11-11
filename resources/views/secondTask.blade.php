@extends('layouts.mainLayout')

@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="leftcol"><!--**************Основное содержание страницы************-->
        <h1>{{$header}}</h1>
        <table>
            @forelse($data as $dataEl)
                @if($loop->first)
                    <tr>
                        @foreach($dataEl as $key => $value)
                            <th>{{$key}}</th>
                        @endforeach
                    </tr>
                @endif
                    <tr>
                        @foreach($dataEl as $key => $value)
                            <td>{{$value}}</td>
                        @endforeach
                    </tr>


            @empty
                <p>
                    {{$title}} отсутствуют :(
                </p>
            @endforelse

        </table>

    </div>
@endsection
