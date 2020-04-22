<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;
use App\Student;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Student $student)
    {
        $schools = School::select('id', 'name')->get();

        return view('student.home', compact('schools'));
    }

    public function update(Request $request, Student $student)
    {

        if(trim($request->password == '')){
            //leave the password field in DB without change
           $request_data = $request->except('password');
        }
        else {
            //chane the password
            $request_data = $request->all();
            $request_data['password'] = bcrypt($request->password);
        }
      
        $student->update($request_data);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->back();

    }//end of update

   
}
