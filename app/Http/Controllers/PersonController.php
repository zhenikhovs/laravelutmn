<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Staff;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    function GetResumes(){
        $header = 'Резюме';
        $title = 'Резюме';
        $resumes= Person::select('id','FIO', 'phone','stage')
            ->get();

        return view('resume.resumes')
            ->with([
                'title'=>$title,
                'header' => $header,
                'resumes'=>$resumes
            ]);
    }

    function GetResume($id){
        $title = 'Резюме';

        $resume = Person::select('people.id', 'FIO', 'phone', 'stage', 'image', 'staff.staff')
            ->join('staff', 'people.staff_id', '=', 'staff.id')
            ->where('people.id','=', $id)
            ->first();

        return view('resume.resume')
            ->with(['title'=> $title,
                'resume'=>$resume
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

        return view('resume.resumes')
            ->with(['title'=> $title,
                'header' => $header,
                'resumes' => $resumes
            ]);
    }

    function AddResumeForm(){
        $title = 'Резюме';
        $header = "Добавить резюме";
        $staff = Staff::all()->toArray();
        return view('resume.add-resume')
            ->with(['title'=> $title,
                'header' => $header,
                'staff' =>$staff
            ]);
    }

    public function AddResume(){
        $requestData = request()->validate(
            ['FIO' => 'required|max:255',
                'phone' => 'required|integer',
                'stage' => 'required',
                'image' => 'required',
                'staff_id' => 'required',
            ]);

        $resume=new Person($requestData);
//        $resume->fill($data); //dump($resume); // что передано в таблицу
        $resume->save();
        return redirect('/resumes/');
    }

    function UpdateResumeForm($id){
        $title = 'Резюме';
        $header = "Изменить резюме";
        $resume = Person::find($id);
        $staff = Staff::all()->toArray();

        return view('resume.update-resume')
            ->with(['title'=> $title,
                'header' => $header,
                'resume' => $resume,
                'staff' =>$staff

            ]);
    }

    function UpdateResume(Request $request, Person $person){
        $this->validate($request,
            ['FIO' => 'required|max:255',
                'phone' => 'required',
                'stage' => 'required',
                'staff_id' => 'required',
            ]);
        $requestData = $request->all();
        $person->update($requestData);
        $person->save();
        return redirect('/resumes');
    }

    public function DeleteResume(Person $person) {
        $person->delete();
        return redirect('/resumes');
    }
}
