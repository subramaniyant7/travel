<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


function getAllCounty(){
    return DB::table('country')->get();
}

function getUserInfo($id = ''){
    $user = DB::table('user_details');
    if($id!='')  $user->where('user_id','=', $id);
    return $user->get();
}

function getUserAddress($id){
    $users = DB::table('user_details')
    ->Join('country', 'user_details.user_country', '=', 'country.country_id')
    ->Join('state', 'user_details.user_state', '=', 'state.state_id')
    ->Join('city', 'user_details.user_city', '=', 'city.city_id')
    ->where('user_details.user_id',  $id)
    ->select('user_details.user_id','user_details.user_fname', 'user_details.user_lname','user_details.user_email',
    'country.country_name', 'state.state_name', 'city.city_name','user_details.user_street','user_details.user_phone','user_details.user_zipcode')
    ->get();
    return $users;
}

function getAllState($id = ''){
    $state = DB::table('state');
    if($id!='')  $state->where('country_id','=', $id);
    return $state->get();
}

function getAllCity($id = ''){
    $city = DB::table('city');
    if($id!='')  $city->where('state_id','=', $id);
    return $city->get();
}

function getFlighSearch($from = '', $to='',$date=''){
    $filter = 'and a.flight_from="'.$from.'" and a.flight_to="'.$to.'" and a.flight_date="'.$date.'" ';
    $flights = DB::select('Select a.*, b.type_name, (SELECT place_name FROM places
                        WHERE place_id = a.flight_from) AS startpoint, (SELECT place_name FROM places WHERE place_id = a.flight_to) AS endpoint
                        from flight_details a, flight_types b where a.flight_type=b.type_id '.$filter.'');
    return $flights;
}

function getFlightDetails($flightId = ''){
    $filter = '';
    if($flightId != '') $filter = 'and a.flight_id="'.$flightId.'"';
    $flights = DB::select('Select a.*, b.type_name, (SELECT place_name FROM places
                        WHERE place_id = a.flight_from) AS startpoint, (SELECT place_name FROM places WHERE place_id = a.flight_to) AS endpoint
                        from flight_details a, flight_types b where a.flight_type=b.type_id '.$filter.'');
    return $flights;
}

function getAddFlightData(){
    return ['types'=> getFlightTypes(),'places'=>getAllPlaces()];
}

function insertData($table,$data){
    $data['status'] = 1;
    $data['created_on'] = Carbon::now();
    try{
        return DB::table($table)->insertGetId($data);
    }catch(Exception $e){
        return false;
    }
}

function updateData($table,$match,$id,$data){
    try{
        $update = DB::table($table)->where($match, $id)->update($data);
        return true;
    }catch(Exception $e){
        return false;
    }
}

function getAllPlaces(){
    return DB::table('places')->where('status', '=', '1')->get();
}

function getFlightTypes(){
    return DB::table('flight_types')->where('status', '=', '1')->get();
}

function getPlace($placeId){
    return DB::table('places')->where([ ['place_id', '=', $placeId], ['status', '=', 1] ])->get();
}

function seatAvailablity($flightId,$sum){
    return DB::table('flight_details')->where([['flight_id', '=', $flightId], ['status', '=', 1] ,['flight_no_of_ticket', '>=', $sum]])->get();
}

?>
