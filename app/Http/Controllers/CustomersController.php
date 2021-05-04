<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index(){
        $this->middleware('auth');
        $result = Customer::paginate(5);
        return view('backend.customer.index', ['customers' => $result]);
    }

    public function store(Request $request){
        $this->middleware('auth');
        $request->validate([
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:customers'],
        ]);
        Customer::create([
            'email' => $request->email,
        ]);
        return redirect()->route('customer.index')->with('success', 'Customer created successfully');
    }

    public function storeCustomer(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:customers'],
        ]);
        Customer::create([
            'email' => $request->email,
        ]);
        return redirect()->back()->with('success_home', 'Customer created successfully');
    }

    public function destroy($id){
        $this->middleware('auth');
        $target = Customer::find($id);
        if (!$target) {
            return redirect()->route('customer.index')->with('error', 'Customer cannot found!');
        }
        $target->delete(); 
        return redirect()->route('customer.index')->with('success', 'Customer delete success!');
    }
}
