<?php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Carbon;

    function dbFormatedDate($date){
        $originalDate = explode('/',$date);
        $formatedDate = $originalDate[2].'-'.$originalDate[0].'-'.$originalDate[1];
        return $formatedDate;
    }

    function message($type= false){
        if($type){
            return ['type'=>'success','msg'=>'Data Saved successfully'];
        }
        return ['type'=>'error','msg'=>'Something went wrong... please try again'];
    }

    function getFormatedDate($date){
        $originalDate = explode('-',$date);
        $formatedDate = $originalDate[2].'-'.$originalDate[1].'-'.$originalDate[0];
        return $formatedDate;
    }

    function getActualDate($date){
        $originalDate = explode('-',$date);
        $formatedDate = $originalDate[1].'/'.$originalDate[2].'/'.$originalDate[0];
        return $formatedDate;
    }

?>
