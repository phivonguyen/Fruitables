<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
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
            'phone' => ['required', 'min:9'],
            'avatar' => [
                'nullable',
                'mimes:jpg,jpeg,png,webp'
            ],
        ]);
        $user = User::find(Auth::user()->id);
        if ($user) {
            $user->update([
                'username' => $request->username,
                'name' => $request->name,
            ]);
            // dd($user->user_detail->user_id);
            if ($user->user_detail != null && $user->user_detail->user_id != null  ) {
                $uploadPath = 'uploads/avatars/';
                if ($request->hasFile('avatar')) {
                    $path = '/uploads/avatars/' . $user->user_detail->avatar;
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                    $file = $request->file('avatar');
                    $ext = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $ext;
                    $file->move('uploads/avatars/', $filename);
                }
                $user->user_detail->update([
                    'user_id' => Auth::user()->id,
                    'phone' => $request->phone,
                    'avatar' => $uploadPath . $filename,
                ]);
                return redirect()->back()->with('success', 'All settings are updated');
            } else {
                if ($request->hasFile('avatar')) {
                    $uploadPath = 'uploads/avatars/';
                    if ($request->hasFile('avatar')) {
                        $file = $request->file('avatar');
                        $ext = $file->getClientOriginalExtension();
                        $filename = time() . '.' . $ext;
                        $file->move('uploads/avatars/', $filename);
                    }

                    $user->user_detail()->create([
                        'user_id' => Auth::user()->id,
                        'phone' => $request->phone,
                        'avatar' => $uploadPath . $filename
                    ]);
                }
                return redirect()->back()->with('success', 'All settings are saved');
            }
        } else {
            // Xử lý trường hợp không tìm thấy người dùng
            return redirect()->back()->with('error', 'User not found');
        }
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
