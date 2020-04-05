<?php

namespace App\Http\Controllers\Dashboard;

use App\Student;
use App\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $students = Student::where('major', 'postgraduate')->when($request->search, function($q) use ($request){

            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.students.majors.postgraduate', compact('students'));

    }//end of postgradute


    public function diploma(Request $request)
    {
        $students = Student::where('major', 'diploma')->when($request->search, function($q) use ($request){

            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.students.majors.diploma', compact('students'));

    }//end of diploma


    public function general3(Request $request)
    {
        $students = Student::where('major', 'general3')->when($request->search, function($q) use ($request){

            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.students.majors.general3', compact('students'));

    }//end of general3


    public function general4(Request $request)
    {
        $students = Student::where('major', 'general4')->when($request->search, function($q) use ($request){

            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.students.majors.general4', compact('students'));

    }//end of general4


    public function primary3(Request $request)
    {
        $students = Student::where('major', 'primary3')->when($request->search, function($q) use ($request){

            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.students.majors.primary3', compact('students'));

    }//end of primary3


    public function primary4(Request $request)
    {
        $students = Student::where('major', 'primary4')->when($request->search, function($q) use ($request){

            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.students.majors.primary4', compact('students'));

    }//end of primary4


    public function kg1(Request $request)
    {
        $students = Student::where('major', 'kg1')->when($request->search, function($q) use ($request){

            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.students.majors.kg1', compact('students'));

    }//end of kg1

    public function kg3(Request $request)
    {
        $students = Student::where('major', 'kg3')->when($request->search, function($q) use ($request){

            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.students.majors.kg3', compact('students'));

    }//end of kg3

    public function kg4(Request $request)
    {
        $students = Student::where('major', 'kg4')->when($request->search, function($q) use ($request){

            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.students.majors.kg4', compact('students'));

    }//end of kg4

    public function notEnrolled(Request $request)
    {
        $students = Student::where(function ($q) use ($request) {

            return $q->where('school_id', null)->when($request->search, function ($query) use ($request) {

                return $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
                
            });

        })->latest()->paginate(5);

        return view('dashboard.students.notenrolled', compact('students'));

    }//end of postgradute

    public function create()
    {
        $schools = School::all();
        return view('dashboard.students.create', compact('schools'));

    }//end of create

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
        return view('dashboard.students.edit', compact('student'));

    }//end of edit

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|array|min:1',
            'phone.0' => 'required',
            'address' => 'required',
        ]);

        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);

        $student->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.students.index');

    }//end of update

    public function destroy(Student $student)
    {
        $student->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->back();

    }//end of destroy

    }//end of controller
