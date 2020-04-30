<?php

namespace App\Http\Controllers\Dashboard;

use App\Attendance;
use App\Student;
use App\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_students'])->only('index');
        $this->middleware(['permission:create_students'])->only('create');
        $this->middleware(['permission:update_students'])->only('edit');
        $this->middleware(['permission:delete_students'])->only('destroy');

    }//end of constructor

    public function postgraduate(Request $request)
    {
       
        $students = Student::where('major', 'postgraduate')->where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('name','like','%'. $request->search .'%')
                        ->orWhere('email','like','%'. $request->search .'%');
            });

        })->latest()->paginate(3);


        return view('dashboard.students.majors.postgraduate', compact('students'));

    }//end of postgradute


    public function diploma(Request $request)
    { 
        
        $students = Student::where('major', 'diploma')->where(function ($q) use ($request) {

        return $q->when($request->search, function ($query) use ($request) {

            return $query->where('name','like','%'. $request->search .'%')
                    ->orWhere('email','like','%'. $request->search .'%');
        });

    })->latest()->paginate(3);
        return view('dashboard.students.majors.diploma', compact('students'));

    }//end of diploma


    public function general3(Request $request)
    {
        $students = Student::where('major', 'general3')->where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {
    
                return $query->where('name','like','%'. $request->search .'%')
                        ->orWhere('email','like','%'. $request->search .'%');
            });
    
        })->latest()->paginate(3);

        return view('dashboard.students.majors.general3', compact('students'));

    }//end of general3


    public function general4(Request $request)
    {
        $students = Student::where('major', 'general4')->where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {
    
                return $query->where('name','like','%'. $request->search .'%')
                        ->orWhere('email','like','%'. $request->search .'%');
            });
    
        })->latest()->paginate(3);

        return view('dashboard.students.majors.general4', compact('students'));

    }//end of general4


    public function primary3(Request $request)
    {
        $students = Student::where('major', 'primary3')->where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {
    
                return $query->where('name','like','%'. $request->search .'%')
                        ->orWhere('email','like','%'. $request->search .'%');
            });
    
        })->latest()->paginate(3);

        return view('dashboard.students.majors.primary3', compact('students'));

    }//end of primary3


    public function primary4(Request $request)
    {
        $students = Student::where('major', 'primary4')->where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {
    
                return $query->where('name','like','%'. $request->search .'%')
                        ->orWhere('email','like','%'. $request->search .'%');
            });
    
        })->latest()->paginate(3);

        return view('dashboard.students.majors.primary4', compact('students'));

    }//end of primary4


    public function kg1(Request $request)
    {
        $students = Student::where('major', 'kg1')->where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {
    
                return $query->where('name','like','%'. $request->search .'%')
                        ->orWhere('email','like','%'. $request->search .'%');
            });
    
        })->latest()->paginate(3);

        return view('dashboard.students.majors.kg1', compact('students'));

    }//end of kg1

    public function kg3(Request $request)
    {
        $students = Student::where('major', 'kg3')->where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {
    
                return $query->where('name','like','%'. $request->search .'%')
                        ->orWhere('email','like','%'. $request->search .'%');
            });
    
        })->latest()->paginate(3);

        return view('dashboard.students.majors.kg3', compact('students'));

    }//end of kg3

    public function kg4(Request $request)
    {
        $students = Student::where('major', 'kg4')->where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {
    
                return $query->where('name','like','%'. $request->search .'%')
                        ->orWhere('email','like','%'. $request->search .'%');
            });
    
        })->latest()->paginate(3);


        return view('dashboard.students.majors.kg4', compact('students'));

    }//end of kg4

    public function notEnrolled(Request $request)
    {
        $students = Student::where('school_id', Null)->where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {
    
                return $query->where('name','like','%'. $request->search .'%')
                        ->orWhere('email','like','%'. $request->search .'%');
            });
    
        })->latest()->paginate(3);

        return view('dashboard.students.majors.notenrolled', compact('students'));

    }//end of notEnrolled

    public function create()
    {
        $schools = School::all();
        return view('dashboard.students.create', compact('schools'));

    }//end of create

    public function show(Student $student)
    {
        $student_attendance = Attendance::attended()->where('student_id', $student->id )->count();
        if ($student->attendances->first->attended){
            $attendance_percentage = $student_attendance / $student->attendances->count() * 100;
        }else{
            $attendance_percentage = 0;
        }
      
        $total_grades = DB::table('student_user')->where('student_id', $student->id)->sum('grades');

    
        return view('dashboard.students.show', compact('student', 'attendance_percentage','total_grades'));

    }//end of show


    public function showAttendance(Student $student)
    {
        $student_attendance = Attendance::attended()->where('student_id', $student->id )->count();
        if ($student->attendances->first->attended){
            $attendance_percentage = $student_attendance / $student->attendances->count() * 100;
        }else{
            $attendance_percentage = 0;
        }


        return view('dashboard.students.showattendance', compact('student','attendance_percentage','student_attendance'));

    }//end of showAttendance

    public function showDegrees(Student $student)
    {
       
        $total_grades = DB::table('student_user')->where('student_id', $student->id)->sum('grades');


        return view('dashboard.students.showdegrees', compact('student','total_grades'));

    }//end of showDegrees

    public function addDegree(Request $request)
    {
        $request->validate([
            'grades' => 'required|numeric',
        ]);

        $user_id = $request->user_id;
        $student_id = $request->student_id;
        $grades  = $request->grades;

        $student = Student::find($student_id);

        $exists = DB::table('student_user')
        ->where('user_id', $user_id)
        ->where('student_id', $student_id)
        ->count() > 0;

        if($exists){
            $student->users()->updateExistingPivot($user_id, ['student_id' => $student_id, 'grades' => $grades]);
        } else {
            $student->users()->attach($user_id, ['student_id' => $student_id, 'grades' => $grades]);
        }

    
        session()->flash('success', __('site.added_successfully'));
        return redirect()->back();

    }// end of addDegree

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'major' => 'required',
            'email' => 'required|unique:students',
            'password' => 'required|confirmed',
        ]);

        $request_data = $request->except(['password', 'password_confirmation', 'permissions', 'image']);
        $request_data['password'] = bcrypt($request->password);

    
         Student::create($request_data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->back();

    }//end of store


    public function edit(Student $student)
    {
        $schools= School::all();
        return view('dashboard.students.edit', compact('student','schools'));

    }//end of edit

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'school_id' => 'required',
        ]);

        $request_data = $request->all();

        $student->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
         return redirect()->route('dashboard.notenrolled');

    }//end of update

    // public function destroy(Student $student)
    // {
    //     $student->delete();
    //     session()->flash('success', __('site.deleted_successfully'));
    //     return redirect()->back();

    // }//end of destroy


}//end of controller
