<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Excel;
use App\Passers;
use DB;
use Validator;


class PassersController extends Controller
{

    public function passers(Request $request){        
        $passers = Passers::paginate(50);

        return view('passers')->with( compact('passers') );
    }

    public function searchPassers(Request $request){
        $search_val = $request->search_val;
        return redirect()->route('search.result', ['search_val' => $search_val]);
        
    }
    public function searchPasserss($search_val = NULL){
        $passers = Passers::where('name','like','%'.$search_val.'%')
                            ->orWhere('campus_eligibility','like','%'.$search_val.'%')
                            ->orWhere('school','like','%'.$search_val.'%')
                            ->orWhere('division','like','%'.$search_val.'%')
                            ->paginate(50);
        return view('passers')->with( compact('passers') );        
    }
    public function schoolRanking(){
        $school_passers = DB::table('passers')
                 ->select('school', DB::raw('count(*) as total'))
                 ->groupBy('school')
                 ->orderBy('total','DESC')
                 ->paginate(50);
        
        return view('passers-count')->with( compact('school_passers') );
    }

    public function addPasser(Request $request){
        $inputs = $request->except('_token');
        
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'campus_eligibility' => 'required',
            'school' => 'required',
            'division' => 'required'
        ];
        $validator = Validator::make($inputs, $rules);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $data = [
            'name' => mb_strtoupper ($request->last_name.', '.$request->first_name),
            'campus_eligibility' => mb_strtoupper ($request->campus_eligibility),
            'school' => mb_strtoupper ($request->school),
            'division' => mb_strtoupper ($request->division)
        ];

        Passers::create($data);
        return redirect('nce-2018-passers')->with('status', 'SUCCESS!');
    }
}
