<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $loginInput = trim($request->input('email'));
        $password = $request->input('password');
        $remember = $request->has('remember');

        // Check if input is email or phone number
        if (filter_var($loginInput, FILTER_VALIDATE_EMAIL)) {
            $credentials = ['email' => $loginInput, 'password' => $password];
        } else {
            $normalizedPhone = \App\Models\Customer::normalizePhone($loginInput);
            $credentials = ['phone' => $normalizedPhone, 'password' => $password];
        }

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            if ($user->role === 'pelanggan') {
                return redirect('/customer/dashboard');
            }
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email/No. Telepon atau password salah',
        ])->withInput($request->except('password'));
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = \App\Models\User::find(Auth::id());
        
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
        }
        
        $user->password = Hash::make($request->password);
        $user->save();
        
        return back()->with('success', 'Password berhasil diubah!');
    }

    public function updateProfile(Request $request)
    {
        $user = \App\Models\User::find(Auth::id());
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'current_password' => 'required',
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        
        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * @return
     */
    public function showProfileForm()
    {
        return view('profile.edit');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}