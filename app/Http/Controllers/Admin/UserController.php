<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'username' => [
                'required',
                'string',
                'max:255'
            ],
            'password' => ['required', 'string', 'min:8'],
            'roles' => ['required', 'integer'],

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'roles' => $request->roles
        ]);

        return redirect('admin/users/')->with('message', 'User created successfully');
    }

    public function edit($user_id)
    {
        $users = User::findOrFail($user_id);
        return view('admin.users.edit', compact('users'));
    }

    public function update(Request $request, int $user_id)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',

            ],
            'username' => [
                'required',
                'string',
                'max:255'
            ],
            'password' => ['required', 'string', 'min:8'],
            'roles' => ['required', 'integer'],

        ]);

        User::findOrFail($user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'roles' => $request->roles
        ]);

        return redirect('admin/users/')->with('message', 'User Updated Info successfully');
    }

    public function delete(int $userId)
    {

        $user = User::findOrFail($userId);
        $user->delete();
        return redirect('admin/users')->with('message', 'User deleted successfully');
    }
}
