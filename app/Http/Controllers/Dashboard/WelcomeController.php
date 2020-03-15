<?php

namespace App\Http\Controllers\Dashboard;

use App\Stage;
use App\Client;
use App\Order;
use App\school;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $stages_count = Stage::count();
        $schools_count = school::count();
        $clients_count = Client::count();
        $users_count = User::whereRoleIs('admin')->count();

        $sales_data = Order::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_price) as sum')
        )->groupBy('month')->get();

        return view('dashboard.welcome', compact('stages_count', 'schools_count', 'clients_count', 'users_count', 'sales_data'));
    
    }//end of index
    
}//end of controller
