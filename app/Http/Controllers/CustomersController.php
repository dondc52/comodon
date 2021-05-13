<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $numPerPage = $request->get('numPerPage') !== null ? $request->get('numPerPage') : env('NUM_PER_PAGE') ;
        $result = Customer::where('email', 'like', "%$search%")->paginate($numPerPage);
        return view('backend.customer.index', ['customers' => $result, 'search' => $search, 'numPerPage' => $numPerPage,]);
    }

    public function create(){
        return view('backend.customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:customers'],
        ]);
        Customer::create([
            'email' => $request->email,
        ]);
        return redirect()->route('customer.index')->with('success', 'Customer created successfully');
    }

    public function storeCustomer(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:customers'],
        ]);
        Customer::create([
            'email' => $request->email,
        ]);
        return redirect()->back()->with('success', 'Customer created successfully');
    }

    public function destroy($id)
    {
        $target = Customer::find($id);
        if (!$target) {
            return redirect()->route('customer.index')->with('error', 'Customer cannot found!');
        }
        $target->delete();
        return redirect()->route('customer.index')->with('success', 'Customer delete success!');
    }
}
