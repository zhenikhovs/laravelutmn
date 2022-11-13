<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
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
}
