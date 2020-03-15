<?php

namespace App\Http\Controllers\Dashboard\Client;

use App\Stage;
use App\Client;
use App\Order;
use App\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function create(Client $client)
    {
        $stages = Stage::with('schools')->get();
        $orders = $client->orders()->with('schools')->paginate(5);
        return view('dashboard.clients.orders.create', compact( 'client', 'stages', 'orders'));

    }//end of create

    public function store(Request $request, Client $client)
    {
        $request->validate([
            'schools' => 'required|array',
        ]);

        $this->attach_order($request, $client);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.orders.index');

    }//end of store

    public function edit(Client $client, Order $order)
    {
        $stages = Stage::with('schools')->get();
        $orders = $client->orders()->with('schools')->paginate(5);
        return view('dashboard.clients.orders.edit', compact('client', 'order', 'stages', 'orders'));

    }//end of edit

    public function update(Request $request, Client $client, Order $order)
    {
        $request->validate([
            'schools' => 'required|array',
        ]);

        $this->detach_order($order);

        $this->attach_order($request, $client);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.orders.index');

    }//end of update

    private function attach_order($request, $client)
    {
        $order = $client->orders()->create([]);

        $order->schools()->attach($request->schools);

        $total_price = 0;

        foreach ($request->schools as $id => $quantity) {

            $school = School::FindOrFail($id);
            $total_price += $school->sale_price * $quantity['quantity'];

            $school->update([
                'stock' => $school->stock - $quantity['quantity']
            ]);

        }//end of foreach

        $order->update([
            'total_price' => $total_price
        ]);

    }//end of attach order

    private function detach_order($order)
    {
        foreach ($order->schools as $school) {

            $school->update([
                'stock' => $school->stock + $school->pivot->quantity
            ]);

        }//end of for each

        $order->delete();

    }//end of detach order

}//end of controller
