<?php

namespace App\Http\Controllers\Dashboard;

use App\Student;
use App\school;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $schools_count = school::count();
        $clients_count = Student::count();
        $users_count = User::whereRoleIs('admin')->count();

        // $sales_data = Order::select(
        //     DB::raw('YEAR(created_at) as year'),
        //     DB::raw('MONTH(created_at) as month'),
        //     DB::raw('SUM(total_price) as sum')
        // )->groupBy('month')->get();

        return view('dashboard.welcome', compact('schools_count', 'clients_count', 'users_count'));
    
    }//end of index
    
}//end of controller
