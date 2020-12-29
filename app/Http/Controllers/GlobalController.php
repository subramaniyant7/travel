<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GlobalController extends Controller
{
    public function login(){
        return view('login');
    }

    public function userValidate(Request $request){
        if ($request->isMethod('post')) {
            $user_name = $request->input('user_name');
            $user_password = $request->input('user_password');
            if($user_name == 'subu' && $user_password == '123' ){
                $request->session()->put('u_name', $user_name);
                return redirect('/');
            }
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Invalid Credentials!');
            return back()->withInput();

        }
        return redirect('/');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

    public function booking(Request $request){
        if($request->session()->get('u_name')){
            $data = $request->input();
            print_r($data);
            return redirect('/');
        }
        return redirect('/login');
    }

}
