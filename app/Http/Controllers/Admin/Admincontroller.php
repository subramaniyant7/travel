<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Admincontroller extends Controller
{

    public function login(Request $request){
       if($request->session()->get('admin_name')) return redirect('/bookingadmin/dashboard');
        return view('admin.login');
    }

    public function isValidate(Request $request){
        $formData = $request->input();
        $isAuthenticate = DB::table('admin')->select('id','admin_name')
                        ->where([
                                    ['admin_name', '=', $formData['username']],
                                    ['admin_password', '=', $formData['password']],
                                ])
                        ->get();
        if(count($isAuthenticate)>0 && $isAuthenticate[0]->admin_name){
            $request->session()->put('admin_name', $isAuthenticate[0]->admin_name);
            return redirect('/bookingadmin/dashboard');
        }
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Invalid Credentials!');
        return back()->withInput();
    }

    public function dashboard(){
        return view('admin.dashboard')->with(['title'=>'Dashboard']);
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/bookingadmin');
    }
}
