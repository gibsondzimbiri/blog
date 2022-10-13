<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.users.users', [
            'users' => User::latest()->paginate(3)
        ]);
    }

    public function create()
    {
        return view('register.create');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'users' => $user
        ]);
    }

    //Register user
    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'thumbnail' => 'required|image',
            'email' => 'required|max:30|unique:users,email',
            'password' => 'required|min:4|max:15'
        ]);

        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        $user = User::create($attributes);

        // session()->flash('success', 'Your account has been created');
        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created');
    }

    //Update user
    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:255',
            'thumbnail' => 'image',
            'email' => 'required|max:30'
        ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $user->update($attributes);

        return back()->with('success', 'You have successfully updated the account');
    }

    //Show user list
    public function showChangePasswordGet(User $user)
    {
        return view('auth.passwords.reset-password', [
            'user' => $user
        ]);
    }


    public function changePasswordPost(Request $request)
    {
        # Validation
        $attributes = request()->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        //return array([$attributes['current_password'], $attributes['new_password'], auth()->user()]);
        $user = Auth::user();

        $current_password = $request->input('current_password');
        $new_password = $request->input('new_password');


        if (!Hash::check($current_password, auth()->user()->password)) {
            return back()->with("success", "Old Password Doesn't match!");
        }

        if (Hash::check($current_password, auth()->user()->password)) {
            // Current password and new password same
            return redirect()->back()->with("success", "New Password cannot be same as your current password.");
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => bcrypt($request->new_password)
        ]);

        return redirect()->back()->with("success", "Password successfully changed!");
    }

    //for admin to reset users passwords
    public function resetPassword(User $user)
    {
        return view('admin.users.reset-password', [
            'users' => $user
        ]);
    }

    public function resetPasswordAdmin(User $user)
    {
        # Validation
        $attributes = request()->validate([
            'password' => 'required|string|min:5',
        ]);

        $user->update($attributes);

        return redirect()->back()->with("success", "Password successfully changed!");
    }
}
