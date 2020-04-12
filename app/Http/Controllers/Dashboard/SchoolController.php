<?php

namespace App\Http\Controllers\Dashboard;

use App\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\User;

class SchoolController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_schools'])->only('index');
        $this->middleware(['permission:create_schools'])->only('create');
        $this->middleware(['permission:update_schools'])->only('edit');
        $this->middleware(['permission:delete_schools'])->only('destroy');

    }//end of constructor
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $schools = School::when($request->search, function($q) use ($request){

            return $q->where('name', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);


        return view('dashboard.schools.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('dashboard.schools.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'user_id' => 'required'
        ]);

        $school = School::create($request->all());

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.schools.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        return view('dashboard.schools.show',compact('school'));

    }

    /**
     * Update the specified resource from storage.
     */
    public function update(Request $request,School $school)
    {
       foreach($school->students as $student){
        $student->update([
            'type' => Null
            ]);
       }

        $student = Student::where('id', $request->leader)->update([
            'type' => 'leader'
            ]);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $school->delete();

        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.schools.index');
    }

}
