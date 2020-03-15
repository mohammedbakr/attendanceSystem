<?php

namespace App\Http\Controllers\Dashboard;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::whereHas('client', function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');

        })->paginate(5);

        return view('dashboard.orders.index', compact('orders'));

    }//end of index

    public function schools(Order $order)
    {
        $schools = $order->schools;
        return view('dashboard.orders._schools', compact('order', 'schools'));

    }//end of schools
    
    public function destroy(Order $order)
    {
        foreach ($order->schools as $school) {

            $school->update([
                'stock' => $school->stock + $school->pivot->quantity
            ]);

        }//end of for each

        $order->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.orders.index');
    
    }//end of order

}//end of controller
