<?php

namespace App\Http\Controllers\Front;

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
    public function index()
    {
        $schools = School::select('id', 'name')->get();

        return view('student.welcome', compact('schools'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'school_id' => 'required',
        ]);

        $student->update($request->all());

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->back();

    }//end of update

}
