<?php

namespace App\Http\Controllers\Dashboard;

use App\Student;
use App\School;
use App\User;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        $schools_count = School::count();
        $students_count = Student::count();
        $users_count = User::whereRoleIs('admin')->count();
        $schools = School::latest()->paginate(5);
        $students = Student::where('school_id', null)->count();

        return view('dashboard.welcome', compact('schools_count', 'students_count', 'users_count', 'schools', 'students'));
    
    }//end of index
    
}//end of controller
