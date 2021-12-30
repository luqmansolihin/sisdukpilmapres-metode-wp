<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PasswordController extends Controller
{
    public function editPassword()
    {
        return view('dashboard.password.ubah-password', [
            "title" => "Ubah Password",
            "user" => User::find(Auth::user()->id)
        ]);
    }

    public function updatePassword(Request $request)
    {
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'Your current password does not match our record.'
            ]);
        }

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        User::where('id', Auth::user()->id)
            ->update([
                'password' => Hash::make($request->password)
            ]);

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Your password has been updated. Please log into this app again!');
    }
}
