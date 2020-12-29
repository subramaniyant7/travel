<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Placecontroller extends Controller
{
    public function places(){
        $places = DB::table('places')->join('flight_types', 'places.place_type', '=', 'flight_types.type_id')
            ->where('places.status', '=', '1')->get();
        return view('admin.places')->with(['title'=>'Places','places'=> $places]);
    }

    public function addPlace(){
        $flightTypes = DB::table('flight_types')->where('status', '=', '1')->get();
        return view('admin.addplace')->with(['title'=>'Add Place','types'=> $flightTypes, 'action'=>'add']);
    }

    public function editPlace(Request $request){
        $placeId = $request->segment(3);
        $flightTypes = DB::table('flight_types')->where('status', '=', '1')->get();
        $places = DB::table('places')->join('flight_types', 'places.place_type', '=', 'flight_types.type_id')
                    ->where([ ['places.place_id', '=', $placeId], ['places.status', '=', 1] ])->get();

        return view('admin.addplace')->with(['title'=>'Edit Place','types'=> $flightTypes,'places'=>$places, 'action'=>'edit']);
    }

    public function savePlace(Request $request){
        if( $request->input('place_id') != 0 ){
            $data = $request->only(['place_name', 'place_type']);
            $savePlace = DB::table('places')
                        ->where('place_id', $request->input('place_id'))
                        ->update($data);
        }else{
            $data = $request->only(['place_name', 'place_type']);
            $data['status'] = 1;
            $data['created_on'] = Carbon::now();
            $savePlace = DB::table('places')->insert($data);
        }

        $notify = $this->message($savePlace,$request);
        $request->session()->flash('message.level', $notify['type']);
        $request->session()->flash('message.content', $notify['msg']);
        return redirect('/bookingadmin/places');
    }

    public function  deletePlace(Request $request){
        $placeId = $request->segment(3);
        $actionPlace = DB::table('places')->where('place_id', '=',$placeId)->delete();
        $notify = $this->message($actionPlace,$request);
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Place deleted successfully');
        return redirect('/bookingadmin/places');
    }


    private function message($type= false,  $request){
        if($type){
            return ['type'=>'success','msg'=>'Place Saved successfully'];
        }
        return ['type'=>'danger','msg'=>'Something went wrong... please try again'];
    }
}
