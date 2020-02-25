<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $req){
        $req->validate([
            'email'=>'required | email',
            'password'=>'required',
        ]);

        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
            $req->session()->put(['email'=>$req->input('email'),'name'=>$user->name]);
            return redirect('dashboard');

        }

        return redirect('/')->with('errormgs', 'Invalid Credentials');
    }
    public function register(Request $req){
        //echo "<pre>";print_r($req->input());exit;
        $validater = $req->validate([
            'name'=>'required',
            'email'=>'required | email | unique:users',
            'password'=>'required | confirmed | min:3'
        ]);

        $usermodel = new User();
        $usermodel->name = $req->input('name');
        $usermodel->email = $req->input('email');
        $usermodel->password = Hash::make($req->input('password'));
        $result = $usermodel->save();
        if($result){
            $req->session()->put(['email'=>$req->input('email'),'name'=>$req->input('name')]);
            //echo "<pre>";print_r(Session::get('email'));exit;
            return redirect('dashboard');
        }

    }

    function logout(Request $req){
        $req->session()->flush();
        return redirect('/');
    }
}
