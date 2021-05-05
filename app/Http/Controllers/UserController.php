<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.user.index', ['users' => User::paginate(5)]);
    }

    public function create()
    {
        return view('backend.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'email' => ['email', 'required', 'unique:users'],
            'password' => ['required'],
            'password_confirm' => 'required|same:password',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->title = $request->title;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($request->image !== null){
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $user->image = $newImageName;
        }
        $user->save();

        return redirect()->route('user.index')->with('success', 'User created successfully');

    }

    public function edit($id)
    {
        return view('backend.user.edit', ['user' => User::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'password' => ['required'],
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->title = $request->title;
        $user->password = Hash::make($request->password);
        if($request->image !== null){
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $user->image = $newImageName;
        }
        $user->save();
        return redirect()->route('user.index')->with('success', 'User updated success!');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('user.index')->with('error', 'User cannot found!');
        }
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User delete success!');
    }
}
