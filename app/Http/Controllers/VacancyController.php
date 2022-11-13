<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
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
}
