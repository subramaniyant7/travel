<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Placecontroller extends Controller
{
    public function places(){
        return view('admin.places')->with(['title'=>'Places','places'=> getAllPlaces()]);
    }

    public function addPlace(){
         return view('admin.addplace')->with(['title'=>'Add Place','types'=> getFlightTypes(), 'action'=>'add']);
    }

    public function editPlace(Request $request){
        $placeData = getPlace($request->segment(3));
        if(count($placeData))  return view('admin.addplace')->with(['title'=>'Edit Place','places'=>$placeData,'action'=>'edit']);
        $notify = message(false);
        return redirect('/bookingadmin/places')->with($notify['type'], $notify['msg']);
    }

    public function savePlace(Request $request){
        $data = $request->except(['_token','place_id','status']);
        if( $request->input('place_id') !='' ){
            $data['status'] = ($request->has('status')) ? 1 : 2 ;
            $savePlace = updateData('places','place_id',$request->input('place_id'),$data);
        }else{
            $savePlace = insertData('places',$data);
        }
        $notify = message($savePlace);
        return redirect('/bookingadmin/places')->with($notify['type'], $notify['msg']);
    }

    public function  deletePlace(Request $request){
        $placeId = $request->segment(3);
        $deletePlace = DB::table('places')->where('place_id', '=',$placeId)->delete();
        $notify = message($deletePlace);
        return redirect('/bookingadmin/places')->with($notify['type'], 'Place Deleted Successfully');
    }

}
