<?php

namespace App\Http\Controllers;

use App\StudentInformation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentInformationController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(Auth::user());
    // }

    public function index(){

        $course="";
        return view('studentform.Courses',compact('course'));
    }

    public function store(){
        
        dd("Hello");
    }

    public function summary(){


        $message = [
            'civil_status.required' => 'Civil Status is required',
            'contact_number.required' => 'Your contact number is required',
            'father_name.required' => 'Father name is required',
            'mother_name.required' => 'Mother name is required',
            'guardian_name.required' => 'Guardian name is required',
            'fcontact_number.required' => 'Father contact number is required',
            'mcontact_number.required' => 'Mother contact number is required',
            'gcontact_numnber.required' => 'Guardian contact number is required',
            'emergency_contact.required' => 'Emergency contact is required',
            'school_last_attended.required' => 'School last attended is required',
            'year_attended.required' => 'Year attended is required'
        ];

        request()->validate([
                'lastname' => 'required|min:3',
                'firstname' => 'required|min:3',
                'middlename' => 'required|min:3',
                'address' => 'required|min:3',
                'gender' => 'required|min:3',
                'email' => 'email|min:4',
                'civil_status' => 'required|min:3',
                'citizenship' => 'required|min:3',
                'birthdate' => 'required|min:4',
                'contact_number' => 'required|min:9',
                'father_name' => 'required|min:3',
                'mother_name' => 'required|min:3',
                'guardian_name' => 'required|min:3',
                'course' => 'required',
                'fcontact_number' => 'required|min:9',
                'mcontact_number' => 'required|min:9',
                'gcontact_number' => 'required|min:9',
                'emergency_contact' => 'required|min:3',
                'school_last_attended' => 'required|min:3',
                'year_attended' => 'required|integer',
                'program' => 'min:2'
              


        ],$message);

            $string='';
            foreach (request('reason') as $value){
                if($value != null)
                    $string .=  $value.',';
            }
            $string = substr($string,0,-1);

           
             StudentInformation::create([
                'lastname' => request('lastname'),
                'firstname' => request('firstname'),
                'middlename' => request('middlename'),
                'email' =>  request('email'),
                'address' => request('address'),
                'gender' => request('gender'),
                'civil_status' => request('civil_status'),
                'citizenship' => request('citizenship'),
                'birthdate' => request('birthdate'),
                'contact_number' => request('contact_number'),
                'father_name' => request('father_name'),
                'mother_name' => request('mother_name'),
                'guardian_name' => request('guardian_name'),
                'fcontact_number' => request('fcontact_number'),
                'mcontact_number' => request('mcontact_number'),
                'gcontact_number' => request('gcontact_number'),
                'emergency_contact' => request('emergency_contact'),
                'course' => request('course'),
                'school_last_attended' => request('school_last_attended'),
                'year_attended' => request('year_attended'),
                'program' => request('program'),
                'topic_inquiry' => request('topic_inquiry'),
                'topic' => request('topic'),
                'school_first_choice' => request('school_first_choice'),
                'school_second_choice' => request('school_second_choice'),
                'school_third_choice' => request('school_third_choice'),
                'school_first_choice_program' => request('school_first_choice_program'),
                'school_second_choice_program' => request('school_second_choice_program'),
                'school_third_choice_program' => request('school_third_choice_program'),
                'reason' => $string
            ]);

        return redirect('student-information/show');
    }

 

    public function show(){

        $attributes = StudentInformation::all()->last();
    
        return view('studentform.show',compact('attributes'));
    }

    public function Courses(){
    
        return view('studentform/Courses');
    }

    public function createshs(){

        return view('studentform/ShsForm');
    }

    public function enroll(){

        //$course = !request('course') ? "": request('course');

            $course = request('course');


    
        return view('studentform.create',compact('course'));
    }
}
