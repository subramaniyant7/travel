<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GlobalController extends Controller
{

    public function home(){
        $places = getAllPlaces();
        return view('home',['places'=>$places]);
    }

    public function register(){
        return view('register',['country'=>getAllCounty()]);
    }

    public function loadState(Request $req){
        if($req->has('id')){
            $result = getAllState($req->input('id'));
            if(count($result)) return response()->json(['status'=> true, 'data'=>$result]);
            return response()->json(['status'=> false, 'msg'=> 'State not found']);
        }
        return view('404');
    }

    public function loadCity(Request $req){
        if($req->has('id')){
            $result = getAllCity($req->input('id'));
            if(count($result)) return response()->json(['status'=> true, 'data'=>$result]);
            return response()->json(['status'=> false, 'msg'=> 'State not found']);
        }
        return view('404');
    }


    public function emailValidate(Request $req){
        if($req->has('email')){
            $emailId = $req->input('email');
            $isEmailValidate = DB::table('user_details')->where('user_email', '=', $emailId)->get();
            if(count($isEmailValidate)) return response()->json(['status'=> true, 'msg'=> 'Email Already exist']);
            return response()->json(['status'=> false, 'msg'=> 'Email Already exist']);
        }
        return view('404');
    }

    public function flightSearch(Request $req){
        $from = $req->input('from');
        $to = $req->input('to');
        $depart = dbFormatedDate($req->input('depart'));
        $filteredFlights = getFlighSearch($from,$to,$depart);
        // $totalTickets = $req->input('adults') + $req->input('kids') + $req->input('infants');
        // $filteredFlights['ticket'] = ($filteredFlights[0]->flight_no_of_ticket >= $totalTickets) ? true : false;

        // echo '<pre>';
        // print_r(seatAvailablity($filteredFlights[0]->flight_id,1000));
        // print_r( $req->all());
        // print_r($filteredFlights);
        // exit;

        return view('flightsearch',['flights'=>$filteredFlights]);
    }


    public function createUser(Request $req){
        $formData = $req->except(['_token','email_validate']);
        $createUser = insertData('user_details',$formData);
        $notify = message($createUser);
        if($createUser){
            $userInfo = getUserInfo($createUser);
            $req->session()->put('travel_uid',$userInfo[0]->user_id);
            $notify['msg'] = 'Customer Registered Successfully';
        }
        return redirect('/')->with($notify['type'], $notify['msg']);

    }

    public function flights(){
        $result = getFlightDetails();
        return view('flights',['flights' => $result]);
    }


    public function login(Request $request){
        if($request->session()->get('travel_uid')){
            return redirect('/');
        }
        return view('login');
    }

    public function userValidate(Request $request){
        if ($request->isMethod('post')) {

            $user_name = $request->input('user_name');
            $user_password = $request->input('user_password');

            $isAuthenticate = DB::table('user_details')->select('user_id','user_email')
                        ->where([ ['user_email', '=', $user_name], ['user_password', '=', $user_password] ])->get();
            if(count($isAuthenticate)>0 && $isAuthenticate[0]->user_email){
                $request->session()->put('travel_uid', $isAuthenticate[0]->user_id);
                return redirect('/');
            }
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Invalid Credentials!');
            return back()->withInput();
        }
        return redirect('/');
    }

    public function logout(Request $request){
        $request->session()->forget('travel_uid');
        return redirect('/');
    }

    public function booking(Request $request){
        if($request->session()->get('travel_uid')){
            $data = $request->except(['_token']);
            $userData = json_decode(json_encode(getUserAddress($request->session()->get('travel_uid'))), true);
            $flightDetails = json_decode(json_encode(getFlightDetails($data['flight_id'])), true);
            $result = array_merge($data ,$flightDetails[0],$userData[0]);
            $adultPrice = $result['flight_adult'] * $result['flight_adult_price'];
            $kidsPrice = ($result['flight_kids'] > 0 ) ? $result['flight_kids'] * $result['flight_kids_price'] : 0;
            $infantPrice = ($result['flight_infants'] > 0 ) ?  $result['flight_infants'] * $result['flight_infant_price'] : 0 ;
            $totalPrice = $adultPrice + $kidsPrice + $infantPrice;
            $result['price'] = $totalPrice;
            return view('bookingconfirmation',['flight'=>$result]);
        }
        return redirect('/login');
    }

    public function flightPayment(Request $request){
        if($request->session()->get('travel_uid')){
            $data = $request->except(['_token']);
            echo '<pre>';
            print_r($data);
        }
    }

}
