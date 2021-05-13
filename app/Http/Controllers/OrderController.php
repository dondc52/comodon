<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){
        $search = $request->get('search');
        $numPerPage = $request->get('numPerPage') !== null ? $request->get('numPerPage') : env('NUM_PER_PAGE') ;
        $result = Order::join('users', 'order.user_id', '=', 'users.id')
            ->join('packages', 'order.package_id', '=', 'packages.id')
            ->where('users.name', 'like', "%{$search}%")
            ->select(['order.id', 'order.status', 'users.name', 'packages.title'])
            ->paginate($numPerPage);

        return view('backend.order.index', [
            'orders' => $result,
            'search' => $search,
            'numPerPage' => $numPerPage,
        ]);
    }

    public function store(Request $request){
        Order::create([
            'user_id' => $request->user,
            'package_id' => $request->package,
            'status' => 0,
        ]);

        return redirect()->back()->with('successOrder', 'Order successfully!');
    }

    public function update($id){
        $target = Order::find($id);
        $target->status = 1;
        $target->save();
        
        return redirect()->back()->with('success', 'Update order successfully!');
    }

    public function destroy($id){
        $result = Order::find($id);
        if (!$result) {
            return redirect()->route('order.index')->with('error', 'Order cannot found!');
        }
        $result->delete();
        return redirect()->route('order.index')->with('success', 'Order delete success!');
    }
}
