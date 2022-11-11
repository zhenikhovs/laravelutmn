<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Staff;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    function GetVacancies(){
        $title = 'Вакансии';
        $header = 'Вакансии';

        $vacancies = Vacancy::select('staff.staff', 'firms.name', 'firms.address')
            ->join('staff', 'vacancies.staff_id', '=', 'staff.id')
            ->join('firms', 'vacancies.firm_id', '=', 'firms.id')
            ->get()
            ->toArray();

        return view('vacancies')
            ->with([
                'title' => $title,
                'header' => $header,
                'vacancies'=>$vacancies
            ]);
    }

    function GetResumes(){
        $header = 'Резюме';
        $title = 'Резюме';
        $resumes= Person::select('id','FIO', 'phone','stage')
            ->get();

        return view('resumes')
            ->with([
                'title'=>$title,
                'header' => $header,
                'resumes'=>$resumes
            ]);
    }


    function GetResume($id){
        $title = 'Резюме';

        $resume = Person::select('FIO', 'phone', 'stage', 'image', 'staff.staff')
            ->join('staff', 'people.staff_id', '=', 'staff.id')
            ->where('people.id','=', $id)
            ->first();

        return view('resume')
            ->with(['title'=> $title,
                'resume'=>$resume
            ]);
    }


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

    function GetStaff(){
        $title = 'Профессии';
        $header = 'Список профессий';
        $staff = Staff::select('staff')
            ->get()
            ->toArray();
        return view('liststaff')
            ->with(['title'=> $title,
                'header' => $header,
                'staff' => $staff
            ]);
    }

    function GetStaffResumes($staffname){
        $title = 'Резюме';
        $header = "Список резюме профессии $staffname";
        $resumes = Person::select('people.id','FIO', 'phone','stage')
            ->join('staff', 'people.staff_id', '=', 'staff.id')
            ->where('staff.staff','=', $staffname)
            ->get()
            ->toArray();

        return view('resumes')
            ->with(['title'=> $title,
                'header' => $header,
                'resumes' => $resumes
            ]);
    }





}
