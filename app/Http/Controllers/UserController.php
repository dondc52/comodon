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

    public function index(Request $request)
    {
        // echo User::first()->id;
        $page = $request->get('page') !== null ? (int) $request->get('page') : 1;
        $numPerPage = env('NUM_PER_PAGE');

            $result = User::limit($numPerPage)->offset(($page - 1) * $numPerPage)
                ->get();
            $totalItems = User::count();
        
        $totalPages = ceil($totalItems / $numPerPage);
        if ($page <= 0 || $page > $totalPages) {
            $page = 1;
            $result = User::limit($numPerPage)->offset(($page - 1) * $numPerPage)
                ->get();
            
        }
        // $result = Post::limit($numPerPage)->offset(($page - 1)*$numPerPage)->get();
        return view('backend.user.index', [
            'users' => $result,
            'totalPages' => $totalPages,
            'currentPage' => $page,
        ]);
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
            'title' => 'required',
            'password' => ['required'],
            'password_confirm' => 'required|same:password',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->title = $request->title;
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
            'name' => ['required', 'max:50'],
            'title' => 'required',
            'password' => ['required'],
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->title = $request->title;
        $user->password = Hash::make($request->password);
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
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('user.index')->with('error', 'Cannot Found!');
        }
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Delete Success!');
    }
}
