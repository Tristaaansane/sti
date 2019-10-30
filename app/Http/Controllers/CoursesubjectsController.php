<?php

namespace App\Http\Controllers;
use App\Coursesubjects;
use App\Course;

use Illuminate\Http\Request;

class CoursesubjectsController extends Controller
{


    public function show(){

       // $subjects = Coursesubjects::all();

       $subjects = Coursesubjects::all(); 
    

    return view('subjects.show',compact('subjects')); 

    }

    public function create(){

        $courses = Course::all();
        return view('admin.Subjects.create',compact('courses'));
    }

    public function store(){

        request()->validate([

            'course_id' => 'required',
            'subject_name' => 'required',
            'subject_description' => 'required',
            'units' => 'required|integer',
            'subject_code' => 'required',
            'year' => 'required|integer',
            'semester' => 'required|integer'
            
        ]);
        
        Coursesubjects::create([
            'course_id' => request('course_id'),
            'subject_name' => request('subject_name'),
            'subject_description' => request('subject_description'),
            'units' => request('units'),
            'subject_code' => request('subject_code'),
            'year' => request('year'),
            'semester' => request('semester')
        ]);

       

        return redirect('subjects');
        
    }

    public function preenroll(){

       //make student_subjects table
       //subjects table

       


    }

    
}
