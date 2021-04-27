<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $result = Customer::all();
        return view('backend.customer.index', ['customers' => $result]);
    }

    public function store(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
        ]);
        Customer::create([
            'email' => $request->email,
        ]);
        return redirect()->route('customer.index')->with('success', 'Customer created successfully');
    }

    public function storefrontend(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
        ]);
        Customer::create([
            'email' => $request->email,
        ]);
        return redirect()->route('home')->with('success', 'Your Subscribed Our Newsletter Successfully');
    }

    public function destroy($id){
        $target = Customer::find($id);
        if (!$target) {
            return redirect()->route('customer.index')->with('error', 'Customer cannot found!');
        }
        $target->delete(); 
        return redirect()->route('customer.index')->with('success', 'Customer delete success!');
    }
}
