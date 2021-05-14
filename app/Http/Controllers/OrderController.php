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

    public function update(Request $request, $id){
        $target = Order::find($id);
        $status = $request->status == 0 ? 0 : 1;
        $target->status = $status;
        $target->save();
        return redirect()->back()->with('success', 'Update order successfully!');
    }

    public function show($id){
        $result = Order::join('users', 'order.user_id', '=', 'users.id')
        ->join('packages', 'order.package_id', '=', 'packages.id')
        ->where('order.id', '=', $id)
        ->select(['order.id', 'users.name', 'users.email', 'packages.title', 
        'packages.description1', 'packages.description2', 'packages.description3', 'packages.price'])->get();

        return view('backend.order.show', [
            'order' => $result[0],
        ]);
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
