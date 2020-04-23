<?php

namespace App\Http\Controllers;

use App\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;
use App\Student;
use Illuminate\Support\Facades\DB;

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
    public function index()
    {
        $schools = School::select('id', 'name')->get();

        $student_attendance = Attendance::attended()->count();
        $total_grades = DB::table('student_user')->where('student_id', auth()->user()->id)->sum('grades');

        if (auth()->user()->type == 'leader') {

            return view('student.leader', compact('schools', 'total_grades', 'student_attendance'));
        } else {
            
            return view('student.home', compact('schools', 'total_grades', 'student_attendance'));
        }
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

    public function showAttendance(Student $student)
    {
        $student_attendance = Attendance::attended()->count();

        return view('student.showattendance', compact('student', 'student_attendance'));

    }//end of showAttendance

    public function storeAttendance(Request $request, Student $student)
    {
        $request->validate([
            'attended' => 'required'
        ]);

        Attendance::create($request->all());

        $student_id = $request->student_id;

        if ($request->attended == 1) {

            DB::table('student_user')->insert(['user_id' => null, 'student_id' => $student_id, 'grades' => 2.5]);
        }

        session()->flash('success', __('site.added_successfully'));
        return redirect()->back();
    }
   
}
