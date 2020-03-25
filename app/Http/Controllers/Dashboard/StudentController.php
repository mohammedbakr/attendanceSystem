<?php

namespace App\Http\Controllers\Dashboard;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::when($request->search, function($q) use ($request){

            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.students.index', compact('students'));

    }//end of index

    public function create()
    {
        return view('dashboard.students.create');

    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|array|min:1',
            'phone.0' => 'required',
            'address' => 'required',
        ]);

        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);

        Student::create($request_data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.students.index');

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
        return redirect()->route('dashboard.students.index');

    }//end of destroy

}//end of controller
