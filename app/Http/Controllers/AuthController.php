<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showdashboard(){
        return view('dashboard');
    }
    public function showlogin(){
        return view('auth.login');
    }
    public function showregister(){
        return view('auth.register');
    }
    public function login(Request $request)
    {
    //    $request->validate([
    //         'username' => 'required',
    //         'password' => 'required',
    //     ]);
         $credential = $request->only('username', 'password');
         if (Auth::attempt(($credential))){
            return redirect()->route('dashboard');
         }
         else{
            return back()->withErrors(['message'=>'please check your username and password']);
         }
        }
    public function register(Request $request)
    {
       $request->validate([
        'name'=>'required',
        'username'=>'required|unique:users',
        'email'=>'required|email|unique:users',
        'phone'=>'nullable',
        'password'=>'required|min:8|confirmed',
       ]);
       User::create([
        'name'=>$request->name,
        'username'=>$request->username,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'password'=>Hash::make($request->password),
       ]);
         return redirect()->route('login')->with('sucsess','registration successfull');
        } 
        
     public function logout(){
        Auth::logout();
        return redirect()->route('welcome');
     }   

    }
    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //         'username' => 'required|string|max:255|unique:users',
    //         'phone' => 'required|string|max:255|unique:users',
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //         'username' => $request->username,
    //         'phone' => $request->phone,
    //     ]);

    //     return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    // }

