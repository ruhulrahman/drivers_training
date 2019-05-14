<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Session;
use Validator;
use App\User;
use DB;
use File;

session_start();

class LocationController extends Controller
{
    public function location() {
        $index_content = view('location');
        return view('index')->with('page_content', $index_content);
    }

    public function divisions($id) {
        $country_id = $id;
        $divisions = DB::table('divisions')->orderBy('div_name', 'ASC')->get();
        echo '<option value="">Select Country</option>';
        foreach ($divisions as $div):
            echo '<option value="' . $div->id . '">' . $div->div_name . '</option>';
        endforeach;
    }

    public function districts($id) {
        $div_id = $id;
        $districts = DB::table('districts')->where('div_id', $div_id)->orderBy('dis_name', 'ASC')->get();
        echo '<option value="">Select Districts</option>';
        foreach ($districts as $dist):
            echo '<option value="' . $dist->id . '">' . $dist->dis_name . '</option>';
        endforeach;
    }

    public function tanas($id) {
        $tanas = DB::table('tanas')->where('dis_id', $id)->orderBy('tana_name', 'ASC')->get();
        echo '<option value="">Select Police Station</option>';
        foreach ($tanas as $tana):
            echo '<option value="' . $tana->id . '">' . $tana->tana_name . '</option>';
        endforeach;
    }


    // public function division_create(Request $request) {
    //     $div_name = $request->div_name;

    //     $create = DB::table('divisions')->insert([
    //         'div_name' => $div_name,
    //     ]);
    //     if ($create) {
    //         Session::put('message', 'Division added successfully');
    //         return Redirect::to('/location');
    //     } else {
    //         Session::put('message', 'Division not added!');
    //     }
    // }

    // public function district_create(Request $request) {
    //     $dis_name = $request->dis_name;
    //     $div_id = $request->div_id;


    //     $create = DB::table('districts')->insert([
    //         'dis_name' => $dis_name,
    //         'div_id' => $div_id,
    //     ]);
    //     if ($create) {
    //         Session::put('message', 'District added successfully');
    //         return Redirect::to('/location');
    //     } else {
    //         Session::put('message', 'District not added!');
    //     }
    // }

    // public function selectAjax(Request $request) {
    //     if ($request->ajax()) {
    //         $states = DB::table('districts')->where('div_id', $request->div_id)->all();
    //         $data = view('ajax-select', compact('states'))->render();
    //         return response()->json(['options' => $data]);
    //     }
    // }

    // public function tana_create(Request $request) {

    //     $crt_tana_validator = Validator::make($request->all(), [
    //                 'create_tana_division_id' => 'required',
    //                 'create_tana_dist_id' => 'required',
    //                 'tana' => 'required|unique:tanas,tana_name',
    //                     ], [
    //                 'create_tana_division_id.required' => 'You can\'t leave this empty.',
    //                 'create_tana_dist_id.required' => 'You can\'t leave this empty.',
    //                 'tana.required' => 'You can\'t leave this empty.',
    //                 'tana.unique' => 'This police station already added.',
    //     ]);

    //     if ($crt_tana_validator->passes()):
    //         $tanaInfo = array();
    //         $tanaInfo['tana_name'] = $request->tana;
    //         $tanaInfo['dis_id'] = $request->create_tana_dist_id;
            
    //         DB::table('tana')->insert($tanaInfo);
            
    //         return response()->json(['success' => '!!! Police Station successfully added. !!!']);
    //     else:
    //         return response()->json(['errors' => $crt_tana_validator->errors()]);
    //     endif;

    // }



    public function division_view() {
        $divisions = DB::table('divisions')->orderby('div_name', 'asc')->get();
        $index_content = view('location.division')
                            ->with('divisions', $divisions);
        return view('index')->with('page_content', $index_content);
    }

    public function district_view() {
        $divisions = DB::table('divisions')->orderby('div_name', 'asc')->get();
        $districts = DB::table('districts')->orderby('dis_name', 'asc')->get();
        $index_content = view('location.district')
                            ->with('divisions', $divisions)
                            ->with('districts', $districts);
        return view('index')->with('page_content', $index_content);
    }

    public function tana_view() {
        $divisions = DB::table('divisions')->orderby('div_name', 'asc')->get();
        $districts = DB::table('districts')->orderby('dis_name', 'asc')->get();
        $tanas = DB::table('tanas')->
        			leftJoin('districts', 'tanas.dis_id', '=', 'districts.id')->
        			select('tanas.*', 'districts.dis_name')->
        			orderby('districts.dis_name', 'asc')->
        			get();
        $index_content = view('location.tana')
                            ->with('divisions', $divisions)
                            ->with('districts', $districts)
                            ->with('tanas', $tanas);
        return view('index')->with('page_content', $index_content);
    }


    
    public function division_create(Request $request) {
        $validator = Validator::make($request->all(), [
            'div_name' => 'unique:divisions,div_name',
                ], [
            'div_name.unique' => 'This division name already added.',
        ]);

        if ($validator->passes()):
            $div_name = $request->div_name;
            $create_div_name = DB::table('divisions')->insert([
                                'div_name' => $div_name
                            ]);
            
            return response()->json(['success' => '!!! Division name successfully created. !!!']);
        else:
            return response()->json(['errors' => $validator->errors()]);
        endif;
    }


    public function division_edit($id){
        $division = DB::table('divisions')
                    ->where('id', $id)
                    ->get();
        $divisions = DB::table('divisions')->orderby('div_name', 'asc')->get();
        $division_edit = view('location.division_edit')
                    ->with('division', $division)
                    ->with('divisions', $divisions);
        return view('index')
            ->with('page_content', $division_edit);
    }

    public function division_delete($id){
        $delete = DB::table('divisions')
                    ->where('id', $id)
                    ->delete();
        if($delete){
            Session::put('message', 'Division deleted successfully!!!');
            return Redirect::to('/division-view');
        }else{
            Session::put('error', 'Division not deleted!!!');
        }
    }

    public function district_delete($id){
        $delete = DB::table('districts')
                    ->where('id', $id)
                    ->delete();
        if($delete){
            Session::put('message', 'District deleted successfully!!!');
            return Redirect::to('/district-view');
        }else{
            Session::put('error', 'District not deleted!!!');
        }
    }

    public function tana_delete($id){
        $delete = DB::table('tanas')
                    ->where('id', $id)
                    ->delete();
        if($delete){
            Session::put('message', 'tana deleted successfully!!!');
            return Redirect::to('/tana-view');
        }else{
            Session::put('error', 'tana not deleted!!!');
        }
    }

    public function district_create(Request $request) {
        $validator = Validator::make($request->all(), [
            'dis_name' => 'unique:districts,dis_name',
            'div_id' => 'required',
                ], [
            'dis_name.unique' => 'This district name already added.',
            'required' => 'Select Division First',
        ]);

        if ($validator->passes()):
            $div_id = $request->div_id;
            $dis_name = $request->dis_name;
            $create_dis_name = DB::table('districts')->insert([
                                'div_id' => $div_id,
                                'dis_name' => $dis_name
                            ]);
            
            return response()->json(['success' => '!!! District name successfully created. !!!']);
        else:
            return response()->json(['errors' => $validator->errors()]);
        endif;
    }


    public function district_edit($id) {
        $district = DB::table('districts')
                    ->where('id', $id)
                    ->get();
        $districts = DB::table('districts')->orderby('dis_name', 'asc')->get();
        $divisions = DB::table('divisions')->orderby('div_name', 'asc')->get();
        $district_edit = view('location.district_edit')
                    ->with('district', $district)
                    ->with('districts', $districts)
                    ->with('divisions', $divisions);
        return view('index')
            ->with('page_content', $district_edit);
    }


    public function tana_edit($id) {
        $tana = DB::table('tanas')->
        				where('id', $id)->
        				get();
        $tanas = DB::table('tanas')->
        			leftJoin('districts', 'tanas.dis_id', '=', 'districts.id')->
        			select('tanas.*', 'districts.dis_name')->
        			orderby('districts.dis_name', 'asc')->
        			get();
        $districts = DB::table('districts')->orderby('dis_name', 'asc')->get();
        $divisions = DB::table('divisions')->
        				orderby('divisions.div_name', 'asc')->
        				get();
        $tana_edit = view('location.tana_edit')
                    ->with('tana', $tana)
                    ->with('tanas', $tanas)
                    ->with('districts', $districts)
                    ->with('divisions', $divisions);
        return view('index')
            ->with('page_content', $tana_edit);
    }


    public function selectAjax(Request $request) {
        if ($request->ajax()) {
            $states = DB::table('districts')->where('div_id', $request->div_id)->all();
            $data = view('ajax-select', compact('states'))->render();
            return response()->json(['options' => $data]);
        }
    }

    public function tana_create(Request $request) {

        $crt_tana_validator = Validator::make($request->all(), [
                    'create_tana_division_id' => 'required',
                    'create_tana_dist_id' => 'required',
                    'tana_name' => 'required|unique:tanas,tana_name',
                        ], [
                    'create_tana_division_id.required' => 'You can\'t leave this empty.',
                    'create_tana_dist_id.required' => 'You can\'t leave this empty.',
                    'tana_name.required' => 'You can\'t leave this empty.',
                    'tana_name.unique' => 'This police station already added.',
        ]);

        if ($crt_tana_validator->passes()):
            $tanaInfo = array();
            $tanaInfo['tana_name'] = $request->tana_name;
            $tanaInfo['dis_id'] = $request->create_tana_dist_id;
            
            DB::table('tanas')->insert($tanaInfo);
            
            return response()->json(['success' => '!!! Police Station successfully added. !!!']);
        else:
            return response()->json(['errors' => $crt_tana_validator->errors()]);
        endif;
    }

    public function tana_update(Request $request) {

        $validator = Validator::make($request->all(), [
                    'create_tana_division_id' => 'required',
                    'create_tana_dist_id' => 'required',
                    'tana_name' => 'required|unique:tana,tana_name',
                        ], [
                    'create_tana_division_id.required' => 'You can\'t leave this empty.',
                    'create_tana_dist_id.required' => 'You can\'t leave this empty.',
                    'tana_name.required' => 'You can\'t leave this empty.',
                    'tana_name.unique' => 'This police station already added.',
        ]);

        if ($validator->passes()):
            $dis_id = $request->create_tana_dist_id;
            $tana_id = $request->tana_id;
            $tana_name = $request->tana_name;
            
            DB::table('tanas')
            ->where('id', $tana_id)
            ->update([
                'tana_name' => $tana_name,
                'dis_id' => $dis_id,
            ]);
            
            return response()->json(['success' => '!!! tana name successfully updated. !!!']);
        else:
            return response()->json(['errors' => $validator->errors()]);
        endif;
    }

    public function find_place(Request $request) {
            $search = $request->searching_name;
            if($search != null){
                $tanas = DB::table('tanas')
                        ->leftJoin('districts', 'districts.id', '=', 'tanas.dis_id')
                        ->rightJoin('divisions', 'divisions.id', '=', 'districts.div_id')
                        ->where('tanas.tana_name', 'like', "%$search%")
                        ->orderBy('tanas.tana_name', 'asc')
                        ->select('tanas.*', 'divisions.div_name', 'districts.dis_name')
                        ->get();

                $districts = DB::table('districts')
                    ->rightJoin('divisions', 'districts.div_id', '=', 'divisions.id')
                    ->where('districts.dis_name', 'like', "%$search%")
                    ->orderBy('districts.dis_name', 'asc')
                    ->select('districts.*', 'divisions.div_name')
                    ->get();

                $divisions = DB::table('divisions')
                ->where('divisions.div_name', 'like', "%$search%")
                ->orderBy('divisions.div_name', 'asc')
                ->select('divisions.*')
                ->get();

                $index_content = view('location.find_place')
                                            ->with('tanas', $tanas)
                                            ->with('districts', $districts)
                                            ->with('divisions', $divisions);
                return view('index')->with('page_content', $index_content);
            }else{
                $index_content = view('location.find_place');
                    return view('index')->with('page_content', $index_content);
            }
    }



    public function division_update(Request $request){
        $validator = Validator::make($request->all(), [
                    'div_name' => 'unique:divisions,div_name',
                        ], [
                    'div_name.unique' => 'This division name already added.',
        ]);

        if ($validator->passes()):
            $div_id = $request->div_id;
            $div_name = $request->div_name;
            
            DB::table('divisions')
            ->where('id', $div_id)
            ->update([
                'div_name' => $div_name,
            ]);
            
            return response()->json(['success' => '!!! Division name successfully updated. !!!']);
        else:
            return response()->json(['errors' => $validator->errors()]);
        endif;
    }


    public function district_update(Request $request){
        $validator = Validator::make($request->all(), [
                    'dis_name' => 'required',
                        ], [
                    'dis_name.required' => 'You can\' leave this empty.',
        ]);

        if ($validator->passes()):
            $div_id = $request->div_id;
            $dis_id = $request->dis_id;
            $dis_name = $request->dis_name;
            
            DB::table('districts')
            ->where('id', $dis_id)
            ->update([
                'dis_name' => $dis_name,
                'div_id' => $div_id,
            ]);
            
            return response()->json(['success' => '!!! District name successfully updated. !!!']);
        else:
            return response()->json(['errors' => $validator->errors()]);
        endif;
    }
}
