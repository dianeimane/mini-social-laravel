<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

       public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6'
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
    ]);

    session(['user_id' => $user->id]);

    return redirect('/posts');}

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string'
        ]);

        $user = User::where('email',$request->email)->first();

        if($user && password_verify($request->password,$user->password)){
            session(['user_id'=>$user->id]);
            return redirect('/posts');
        }

        return back();
    }

    public function logout()
    {
        session()->forget('user_id');
        return redirect('/login');
    }
}