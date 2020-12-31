<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


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
        return DB::table($table)->insert($data);
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
    return DB::table('places')->get();
}

function getFlightTypes(){
    return DB::table('flight_types')->where('status', '=', '1')->get();
}

function getPlace($placeId){
    return DB::table('places')->where([ ['places.place_id', '=', $placeId], ['places.status', '=', 1] ])->get();
}

?>
