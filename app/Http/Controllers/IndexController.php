<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Staff;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    function Task2(){
        $title = 'Задание 2';
        return view('task2')
            ->with(['title' => $title,
            ]);
    }

    function GetPeopleWithStage(){
        $title = 'Задание 2';
        $header = 'Фамилии персон, имеющих стаж от 5 до 15 лет';
        $people = Person::select('FIO', 'stage')
            ->where('stage','>', 4)
            ->where('stage','<', 15)
            ->get()
            ->toArray();

        return view('secondTask')
            ->with(['title'=> $title,
                'header' => $header,
                'data' => $people
            ]);
    }

    function GetProgrammers(){
        $title = 'Задание 2';
        $header = 'Фамилии и стаж людей с профессией Программист';
        $people = Person::select('FIO', 'stage', 'staff.staff')
            ->join('staff', 'people.staff_id', '=', 'staff.id')
            ->where('staff.staff','=', 'Программист')
            ->get()
            ->toArray();

        return view('secondTask')
            ->with(['title'=> $title,
                'header' => $header,
                'data' => $people
            ]);
    }

    function GetResumeCount(){
        $title = 'Задание 2';
        $header = 'Общее число резюме в базе';
        $people = Person::count();

        return view('secondTask')
            ->with(['title'=> $title,
                'header' => $header,
                'data' => [['count' => $people]]
            ]);
    }

    function GetDistinctResumeCount(){
        $people = Person::distinct('Phone')->count();
    }

    function GetResumeStaff(){
        $title = 'Задание 2';
        $header = 'Профессии, представители которых имеются в резюме';
        $people = Person::select('staff.staff')
            ->join('staff', 'people.staff_id', '=', 'staff.id')
            ->groupBy('staff.staff')
            ->get()
            ->toArray();
        return view('secondTask')
            ->with(['title'=> $title,
                'header' => $header,
                'data' => $people
            ]);
    }





}
