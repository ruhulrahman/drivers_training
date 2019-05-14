<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Session;
use Validator;
session_start();

class ListedDriverController extends Controller
{
    public function total_listed_drivers() {
        $drivers = DB::table('drivers')->where('exam_listed', '!=', '')->get();
        $index_content = view('listed.total_listed_drivers')->with('drivers', $drivers);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function driver_exam_unlisted($id){
        $update = DB::table('drivers')
            ->where('id', $id)
            ->update(['exam_listed' => '']);
        if($update){
            Session::put('message', 'Driver unlisted successfully!!!');
            return back();
        }else{
            Session::put('error', 'Driver not unlisted!!!');
        }
    }
  
    public function search_listed_driver(Request $request) {
        $search = $request->search;
        if($search != null){                
            $drivers = DB::table('drivers')
                ->where(function($q) use ($search){
                    $q->where('exam_listed', '!=', '')
                    ->where('name', 'like', '%'.$search.'%');
                  })
                ->orwhere(function($q) use ($search){
                    $q->where('exam_listed', '!=', '')
                    ->where('mobile', 'like', $search);
                  })
                ->orwhere(function($q) use ($search){
                    $q->where('exam_listed', '!=', '')
                    ->where('dl_no', 'like', $search);
                  })
                ->orwhere(function($q) use ($search){
                    $q->where('exam_listed', '!=', '')
                    ->where('date_of_birth', 'like', $search);
                  })
                ->get();

        $index_content = view('listed.search_listed_driver')->with('drivers', $drivers);
        return view('index')
            ->with('page_content', $index_content);
        }else{
            //$drivers = DB::table('drivers')->get();
            $index_content = view('listed.search_listed_driver');
        return view('index')
            ->with('page_content', $index_content);
        }

    }
    
    public function listed_drivers_search_withdate(Request $request) {
        $exam_date = $request->exam_date;

        if($exam_date != null){
         
            $drivers = DB::table('drivers')
                ->where('exam_date', $exam_date)
                ->where('exam_listed', '!=', '')
                ->get();

            $index_content = view('listed.listed_drivers_search_withdate')->with('drivers', $drivers);
            return view('index')
                ->with('page_content', $index_content);
        }else{
            //$drivers = DB::table('drivers')->get();
            $index_content = view('listed.listed_drivers_search_withdate');
            return view('index')
            ->with('page_content', $index_content);
        }



    }

    public function listed_search_count(Request $request) {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        if($start_date != null && $end_date != null){
         if($start_date == $end_date){
                $drivers = DB::table('drivers')
                    ->where([
                        ['created_at', '=', $start_date]
                    ])
                    ->where('exam_listed', '!=', '')
                    ->get();
            }else{
                $drivers = DB::table('drivers')
                    ->where([
                        ['created_at', '>=', $start_date], 
                        ['created_at', '<=', $end_date]
                    ])
                    ->where('exam_listed', '!=', '')
                    ->get(); 
            }

            $index_content = view('listed.listed_search_count')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
            return view('index')
                ->with('page_content', $index_content);
        }else{
            $index_content = view('listed.listed_search_count');
            return view('index')
            ->with('page_content', $index_content);
        }

    }

    public function listed_prof_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('dl_type', 'prof')
                ->where('exam_listed', '!=', '')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('dl_type', 'prof')
                ->where('exam_listed', '!=', '')
                ->get(); 
        }
        $index_content = view('listed.prof_driver')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function listed_nonprof_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('dl_type', 'non-prof')
                ->where('exam_listed', '!=', '')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('dl_type', 'non-prof')
                ->where('exam_listed', '!=', '')
                ->get(); 
        }
        $index_content = view('listed.nonprof_driver')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function listed_light_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('dl_type', 'light')
                ->where('exam_listed', '!=', '')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('dl_class', 'light')
                ->where('exam_listed', '!=', '')
                ->get(); 
        }
        $index_content = view('listed.light_driver')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function listed_lightmotorcycle_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('dl_type', 'lightmotorcycle')
                ->where('exam_listed', '!=', '')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('dl_class', 'lightmotorcycle')
                ->where('exam_listed', '!=', '')
                ->get(); 
        }
        $index_content = view('listed.lightmotorcycle_driver')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function listed_medium_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('dl_type', 'medium')
                ->where('exam_listed', '!=', '')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('dl_class', 'medium')
                ->where('exam_listed', '!=', '')
                ->get(); 
        }
        $index_content = view('listed.medium_driver')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function listed_heavy_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('dl_type', 'heavy')
                ->where('exam_listed', '!=', '')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('dl_class', 'heavy')
                ->where('exam_listed', '!=', '')
                ->get(); 
        }
        $index_content = view('listed.heavy_driver')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function listed_psv_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('dl_type', 'psv')
                ->where('exam_listed', '!=', '')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('dl_class', 'psv')
                ->where('exam_listed', '!=', '')
                ->get(); 
        }
        $index_content = view('listed.psv_driver')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function listed_new_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('dl_issue', 'new')
                ->where('exam_listed', '!=', '')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('dl_issue', 'new')
                ->where('exam_listed', '!=', '')
                ->get(); 
        }
        $index_content = view('listed.new_driver')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function listed_renew_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('dl_issue', 'renew')
                ->where('exam_listed', '!=', '')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('dl_issue', 'renew')
                ->where('exam_listed', '!=', '')
                ->get(); 
        }
        $index_content = view('listed.renew_driver')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function listed_total_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('exam_listed', '!=', '')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('exam_listed', '!=', '')
                ->get(); 
        }
        $index_content = view('listed.total_driver_by_search')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }


    public function training_certificate($id){
        $drivers = DB::table('drivers')
                    ->where('id', $id)
                    ->where('exam_listed', '!=', '')
                    ->get();
        return view('listed.cert')->with('drivers', $drivers);
        
    }


}
