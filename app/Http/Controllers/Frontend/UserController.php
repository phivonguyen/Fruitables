<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.users.profile');
    }

    public function updateUser(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string'],
            'username' => ['required', 'string'],
            'phone' => ['required', 'digits:9'],
            'avatar' => [
                'nullable',
                'mimes:jpg,jpeg,png,webp'
            ],
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'username' => $request->username,
            'name' => $request->name,
        ]);

        $uploadPath = 'uploads/avatars/';
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/avatars/', $filename);
            $user->user_detail()->avatar = $uploadPath . $filename;
        }
        $user->user_detail()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'phone' => $request->phone,
            ]
        );
        return redirect()->back()->with('message', 'User profile updated');
    }

    public function passwordCreate()
    {
        return view('frontend.users.change-password');
    }

    public function passwordChange(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'different:current_password']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if ($currentPasswordStatus) {

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message', 'Password Updated Successfully');
        } else {
            return redirect()->back()->with('message', 'Current Password does not match with Old Password');
        }
    }
}
