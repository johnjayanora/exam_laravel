<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Passers;
use DB;

class PassersApiController extends Controller
{
    public function passers(Request $request){        
        $passers = Passers::paginate(50);

        return \Response::json($passers,200);
    }
    public function searchPassers($search_val){
    	        
        $passers = Passers::where('name','like','%'.$search_val.'%')
                            ->orWhere('campus_eligibility','like','%'.$search_val.'%')
                            ->orWhere('school','like','%'.$search_val.'%')
                            ->orWhere('division','like','%'.$search_val.'%')
                            ->paginate(50);
		return \Response::json($passers,200);
    }
    public function schoolRanking(){
        $school_passers = DB::table('passers')
                 ->select('school', DB::raw('count(*) as total'))
                 ->groupBy('school')
                 ->orderBy('total','DESC')
                 ->paginate(50);
        
        return \Response::json($school_passers,200);
    }
    public function addPasser(Request $request){
    	
    	$temp_data = '';
    	foreach ($_POST as $key => $value) {
    		$temp_data = $key;
    	}
    	$examinee = json_decode($temp_data,true);



        $data = [
            'name' => mb_strtoupper ($examinee['examinee']['last_name'].', '.$examinee['examinee']['first_name']),            
            'campus_eligibility' => mb_strtoupper ($examinee['examinee']['campus_eligibility']),
            'school' => mb_strtoupper ($examinee['examinee']['school']),
            'division' => mb_strtoupper ($examinee['examinee']['division'])
        ];
       Passers::create($data);

       return \Response::json(['msg' => 'Examinee Successfully Inserted'],200);
    }
}
