<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function adduser(Request $request){
        $request->validate([
            'name' => 'required',
            'email'=>'required|string|email|max:255',
            'password' => 'required'
        ]);
        // $params['password']= bycrypt($params['password']);
        $Users = new User;
        $Users->name= $request->name;
        $Users->email= $request->email;
        $Users->password= $request->password;
        $Users->save();
        return  redirect('/dashboard');
    }

    public function userprofile(){
        $user = User::where('email', 'devapraveen10@gmail.com')->first();
        return view('profile', ['user' => $user]);
    }

    public function userupdate(Request $request){
        $request->validate([
            'name' => 'required',
            'email'=>'required|string|email|max:255'
        ]);
        User::where('email', $request['email'])->update(['name' => $request['name']]);
        return  redirect('/profile');
    }

    public function signin(Request $request){
        $request->validate([
            'email'=>'required',
            'password' => 'required'
        ]);
        $logUser = User::where('email', $request['email'])->where('password', $request['password'])->first();
        // return view('components.dashboard', ['loggedinuser'=> $logUser]);
        return  redirect('/dashboard');
    }
}
