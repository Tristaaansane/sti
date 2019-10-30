<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentInformation;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Coursesubjects;

class AdminController extends Controller
{
    
    public function requests(){

        $requests = StudentInformation::all();

        return view('admin.requests',compact('requests'));
    }


    public function createId(){
        
        $id = request('id');
       
        $student = StudentInformation::findOrFail($id);
      
        request()->validate([
            'id_number' => 'required'
        ]);

        $student->update([
            'id_number' => request('id_number'),
            'status' => true
            ]);
            
        

            $password = str_replace("/","",$student->birthdate);
            
            User::create([
                'id_number' => $student->id_number,
                'password' => Hash::make($password),
            ]);

        return back();
    
    }
    

    public function Subjects(){

        $requests = StudentInformation::all();

        return view('admin.Subjects',compact('Subjects'));
    }

    public function adminLogin(){

        return view('admin/adminLogin');
    }

   
      
        public function storeSubjects(){


            request()->validate([

            ]);


            Coursesubjects::create([ 
                'course_id' => request('course_id'),
                'subject_Name' => request('subject_name'),
                'subject_description' => request('subject_description'),
                'units' => request('units'),
                'subjectcode' =>  request('subjectcode'),
                'status' => request('address'),
                'year' => request('gender'),
                'semester' => request('civil_status')
            ]);


            return redirect('admin/storeSubjects');
        }
}



