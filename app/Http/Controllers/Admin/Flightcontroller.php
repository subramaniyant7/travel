<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Flightcontroller extends Controller
{
    public function flights(){

        $flights = DB::select('Select a.*, b.type_name, (SELECT place_name FROM places
                            WHERE place_id = a.flight_from) AS startpoint, (SELECT place_name FROM places WHERE place_id = a.flight_to) AS endpoint
                            from flight_details a, flight_types b where a.flight_type=b.type_id');

        return view('admin.flights')->with(['title'=>'Flights','flights'=> $flights]);
    }

    public function addFlight(){
        $domestic = DB::table('places')->where([['status', '=', '1'],['place_type', '=',1]])->get();
        $international = DB::table('places')->where([['status', '=', '1'],['place_type','=',2]])->get();
        $flightTypes = DB::table('flight_types')->where('status', '=', '1')->get();
        return view('admin.addflight')->with(['title'=>'Add Flight','types'=> $flightTypes,'domestic'=>$domestic,'international'=>$international]);
    }

    public function saveFlight(Request $request){
        $flightData =  $request->except(['_token',]);
        $originalDate = explode('/',$flightData['flight_date']);
        $flightData['flight_date'] = $originalDate[2].'-'.$originalDate[0].'-'.$originalDate[1];
        $flightData['status'] = 1;
        $flightData['created_on'] = Carbon::now();
        $saveFlight = DB::table('flight_details')->insert($flightData);

        $notify = $this->message($saveFlight,$request);
        $request->session()->flash('message.level', $notify['type']);
        $request->session()->flash('message.content', $notify['msg']);
        return redirect('/bookingadmin/flights');
    }

    private function message($type= false,  $request){
        if($type){
            return ['type'=>'success','msg'=>'Data Saved successfully'];
        }
        return ['type'=>'danger','msg'=>'Something went wrong... please try again'];
    }
}
