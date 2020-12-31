<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Flightcontroller extends Controller
{
    public function flights(){
       $flights = getFlightDetails();
       return view('admin.flights')->with(['title'=>'Flights','flights'=> $flights]);
    }

    public function addFlight(){
        return view('admin.addflight')->with(array_merge(getAddFlightData(),['title'=>'Add Flight','action'=>'add']));
    }

    public function editFlight(Request $request){
        $flights = getFlightDetails($request->segment(3));
        if(count($flights)) return view('admin.addflight')->with(array_merge(getAddFlightData(),['title'=>'Edit Flight','flights'=>$flights,'action'=>'edit']));
        $notify = message(false);
        return redirect('/bookingadmin/flights')->with($notify['type'], $notify['msg']);
    }

    public function saveFlight(Request $request){
        if($request->input('flight_id')!=''){
            if($request->file('flight_image')){
                $originalFileName = time().'_'.$request->file('flight_image')->getClientOriginalName();
                $fileUpload = $request->flight_image->move(public_path('uploads/flights'), $originalFileName);
            }else{
                $originalFileName = $request->input('flight_edit_image');
            }
            $flightData =  $request->except(['_token','flight_id','flight_edit_image']);
            $flightActualData = $this->prepareFlightData($flightData,$originalFileName);
            $flightActualData['status'] = ($request->has('status')) ? 1 : 2 ;
            $saveFlight = updateData('flight_details','flight_id',$request->input('flight_id'),$flightActualData);
        }else{
            $flightData =  $request->except(['_token',]);
            $originalFileName = $request->file('flight_image')->getClientOriginalName();
            $fileUpload = $request->flight_image->move(public_path('uploads/flights'), time().'_'.$originalFileName);
            $flightActualData = $this->prepareFlightData($flightData,time().'_'.$originalFileName);
            $saveFlight = insertData('flight_details',$flightActualData);
        }
        $notify = message($saveFlight);
        return redirect('/bookingadmin/flights')->with($notify['type'], $notify['msg']);
    }

    public function deleteFlight(Request $request){
        $flightId = $request->segment(3);
        $deleteFlight = DB::table('flight_details')->where('flight_id', '=',$flightId)->delete();
        $notify = message($deleteFlight);
        return redirect('/bookingadmin/flights')->with($notify['type'], 'Flight Deleted Successfully');
    }

    private function prepareFlightData($data,$image){
        $flightData = $data;
        $flightData['flight_date'] = dbFormatedDate($data['flight_date']);
        $flightData['flight_image'] = $image;
        $flightData['flight_desc'] = trim($data['flight_desc']);
        return $flightData;
    }

}
