<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $numPerPage = $request->get('numPerPage') !== null ? $request->get('numPerPage') : env('NUM_PER_PAGE') ;
        $result = User::where('name', 'like', "%{$search}%")
            ->paginate($numPerPage);

        return view('backend.user.index', [
            'users' => $result,
            'search' => $search,
            'numPerPage' => $numPerPage,
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return view('backend.user.show')->with('error', 'Cannot Found!');
        } else {
            return view('backend.user.show', ['user' => $user]);
        }
    }

    public function create()
    {
        return view('backend.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['email', 'required', 'unique:users'],
            'password' => ['required'],
            'password_confirm' => 'required|same:password',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->title = $request->title;
        // $user->email_verified_at = time();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($request->image !== null) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $user->image = $newImageName;
        }
        $user->save();

        return redirect()->route('user.index')->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        return view('backend.user.edit', ['user' => User::find($id)]);
    }

    public function editpw($id)
    {
        return view('backend.user.editpw', ['user' => User::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->title = $request->title;
        if ($request->image !== null) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $user->image = $newImageName;
        }
        $user->save();
        return redirect()->route('user.index')->with('success', 'Updated Success!');
    }

    public function updatepw(Request $request, $id)
    {
        $request->validate([
            'password' => ['required'],
            'password_confirm' => 'required|same:password',
        ]);
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user.index')->with('success', 'Updated Success!');
    }

    public function destroy($id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('user.index')->with('error', 'The logged in user cannot be deleted!');
        }
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('user.index')->with('error', 'Cannot Found!');
        }
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Delete Success!');
    }
}
