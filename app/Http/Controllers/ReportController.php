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

class ReportController extends Controller
{
    public function listed_report(Request $request){
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

            $index_content = view('report.listed_report')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
            return view('index')
                ->with('page_content', $index_content);
        }else{
            $index_content = view('report.listed_report');
            return view('index')
            ->with('page_content', $index_content);
        }
    }


    public function unlisted_report(Request $request){
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        if($start_date != null && $end_date != null){
         if($start_date == $end_date){
                $drivers = DB::table('drivers')
                    ->where([
                        ['created_at', '=', $start_date]
                    ])
                    ->where('exam_listed', '=', '')
                    ->get();
            }else{
                $drivers = DB::table('drivers')
                    ->where([
                        ['created_at', '>=', $start_date], 
                        ['created_at', '<=', $end_date]
                    ])
                    ->where('exam_listed', '=', '')
                    ->get(); 
            }

            $index_content = view('report.unlisted_report')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
            return view('index')
                ->with('page_content', $index_content);
        }else{
            $index_content = view('report.unlisted_report');
            return view('index')
            ->with('page_content', $index_content);
        }
    }


    public function mutual_report(Request $request){
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        if($start_date != null && $end_date != null){
         if($start_date == $end_date){
                $drivers = DB::table('drivers')
                    ->where([
                        ['created_at', '=', $start_date]
                    ])
                    ->get();
            }else{
                $drivers = DB::table('drivers')
                    ->where([
                        ['created_at', '>=', $start_date], 
                        ['created_at', '<=', $end_date]
                    ])
                    ->get(); 
            }

            $index_content = view('report.mutual_report')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
            return view('index')
                ->with('page_content', $index_content);
        }else{
            $index_content = view('report.mutual_report');
            return view('index')
            ->with('page_content', $index_content);
        }
    }


}
