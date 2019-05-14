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

class AdminController extends Controller 
{

    public function __construct() {
        $AdminId = Session::get('AdminId');
        $AdminName = Session::get('AdminName');
    }

    public function index() {
        $AdminId = Session::get('AdminId');
        if ($AdminId != Null) {
            return Redirect::to('/admin-dashboard/')->send();
        }
        return view('login');
    }

    public function admin_dashboard() {
        $AdminId = Session::get('AdminId');
        if ($AdminId == Null) {
            return Redirect::to('/')->send();
        }
        $users = DB::table('admin')->get();
        $index_content = view('index_page_content');
        return view('index')->with('users', $users)->with('page_content', $index_content);
    }

    public function AdminLogin(Request $request) {
        $username = $request->username;
        $password = md5($request->password);

        $adminQuery = DB::table('admin')
                        ->where('username', $username)
                        ->where('password', $password)
                        ->first();
        if($adminQuery) {
            Session::put('AdminId', $adminQuery->id);
            Session::put('AdminName', $adminQuery->name);

            return Redirect::to('/admin-dashboard/');
        }else{
            Session::put('message', 'User email and password not match!!');
            return Redirect::to('/');
        }        
    }






    public function location() {
        $index_content = view('admin.location');
        return view('admin.index')->with('page_content', $index_content);
    }

    public function division($id) {
        $country_id = $id;
        $division = DB::table('division')->where('country_id', $country_id)->get();
        echo '<option value="">Select Country</option>';
        foreach ($division as $dvn):
            echo '<option value="' . $dvn->id . '">' . $dvn->division_name . '</option>';
        endforeach;
    }

    public function district($id) {
        $divesion_id = $id;
        $district = DB::table('district')->where('division_id', $divesion_id)->get();
        echo '<option value="">Select District</option>';
        foreach ($district as $dist):
            echo '<option value="' . $dist->id . '">' . $dist->district_name . '</option>';
        endforeach;
    }

    public function thana($id) {
        $thana = DB::table('thana')->where('district_id', $id)->get();
        echo '<option value="">Select Thana</option>';
        foreach ($thana as $thn):
            echo '<option value="' . $thn->id . '">' . $thn->thana_name . '</option>';
        endforeach;
    }

    public function country_create(Request $request) {
        $country = $request->country;


        $create_country = DB::table('country')->insert([
            'country_name' => $country
        ]);
        if ($create_country) {
            Session::put('message', 'Country added successfully');
            return Redirect::to('/location');
        } else {
            Session::put('message', 'Country not added!');
        }
    }

    public function division_create(Request $request) {
        $division_name = $request->division_name;
        $country_id = $request->country_id;


        $create = DB::table('division')->insert([
            'division_name' => $division_name,
            'country_id' => $country_id,
        ]);
        if ($create) {
            Session::put('message', 'Division added successfully');
            return Redirect::to('/location');
        } else {
            Session::put('message', 'Division not added!');
        }
    }

    public function district_create(Request $request) {
        $district_name = $request->district_name;
        $division_id = $request->division_id;


        $create = DB::table('district')->insert([
            'district_name' => $district_name,
            'division_id' => $division_id,
        ]);
        if ($create) {
            Session::put('message', 'District added successfully');
            return Redirect::to('/location');
        } else {
            Session::put('message', 'District not added!');
        }
    }

    public function selectAjax(Request $request) {
        if ($request->ajax()) {
            $states = DB::table('district')->where('division_id', $request->division_id)->all();
            $data = view('ajax-select', compact('states'))->render();
            return response()->json(['options' => $data]);
        }
    }

    public function thana_create(Request $request) {

        $crt_thana_validator = Validator::make($request->all(), [
                    'country_id' => 'required',
                    'create_thana_division_id' => 'required',
                    'create_thana_dist_id' => 'required',
                    'thana' => 'required|unique:thana,thana_name',
                        ], [
                    'country_id.required' => 'You can\'t leave this empty.',
                    'create_thana_division_id.required' => 'You can\'t leave this empty.',
                    'create_thana_dist_id.required' => 'You can\'t leave this empty.',
                    'thana.required' => 'You can\'t leave this empty.',
                    'thana.unique' => 'This police station already added.',
        ]);

        if ($crt_thana_validator->passes()):
            $thanaInfo = array();
            $thanaInfo['thana_name'] = $request->thana;
            $thanaInfo['district_id'] = $request->create_thana_dist_id;
            
            DB::table('thana')->insert($thanaInfo);
            
            return response()->json(['success' => '!!! Police Station successfully added. !!!']);
        else:
            return response()->json(['errors' => $crt_thana_validator->errors()]);
        endif;



//        $thana_name = $request->thana_name;
//        $thana_id = $request->thana_id;
//
//
//        $create = DB::table('thana')->insert([
//                    'thana_name' => $thana_name,
//                    'thana_id' => $thana_id,
//                ]);
//        if($create){
//            Session::put('message', 'Thana added successfully');
//            return Redirect::to('/location');
//        }else{
//            Session::put('message', 'Thana not added!');
//        }
    }

    public function add_new_driver() {
        $WebcamController=new WebcamController();
        $WebcamController->showImage();

        $divisions = DB::table('divisions')->orderby('div_name', 'asc')->get();
        $districts = DB::table('districts')->orderby('dis_name', 'asc')->get();
        $tanas = DB::table('tanas')->
                    leftJoin('districts', 'tanas.dis_id', '=', 'districts.id')->
                    select('tanas.*', 'districts.dis_name')->
                    orderby('districts.dis_name', 'asc')->
                    get();
        $index_content = view('add_new_driver')
                            ->with('divisions', $divisions)
                            ->with('districts', $districts)
                            ->with('tanas', $tanas);

        return view('index')
            ->with('page_content', $index_content);
    }

    public function add_new_user() {
        //$WebcamController=new WebcamController();
        
        $offices = DB::table('offices')->get();
        $index_content = view('add_new_user')->with('offices', $offices);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function add_new_office() {
        //$WebcamController=new WebcamController();
        

        $index_content = view('add_new_office');
        return view('index')
            ->with('page_content', $index_content);
    }

    public function search_driver(Request $request) {
        $search = $request->search;
        if($search != null){
            $drivers = DB::table('drivers')
                    ->where('name', 'like', '%'.$search.'%')
                    ->orwhere('mobile', 'like', $search)
                    ->orwhere('dl_no', 'like', $search)
                    ->orwhere('date_of_birth', 'like', $search)
                    ->get();

        $index_content = view('search_driver')->with('drivers', $drivers);
        return view('index')
            ->with('page_content', $index_content);
        }else{
            //$drivers = DB::table('drivers')->get();
            $index_content = view('search_driver');
        return view('index')
            ->with('page_content', $index_content);
        }

    }

    public function timing_search(Request $request) {
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

            $index_content = view('timing_search')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
            return view('index')
                ->with('page_content', $index_content);
        }else{
            //$drivers = DB::table('drivers')->get();
            $index_content = view('timing_search');
            return view('index')
            ->with('page_content', $index_content);
        }

    }

    public function timing_search_total_list(Request $request) {
        //$request->session()->flash()
        $exam_date = $request->exam_date;

        if($exam_date != null){
         
            $drivers = DB::table('drivers')
                ->where('exam_date', $exam_date)
                ->get();

            $index_content = view('timing_search_total_list')->with('drivers', $drivers);
            return view('index')
                ->with('page_content', $index_content);
        }else{
            //$drivers = DB::table('drivers')->get();
            $index_content = view('timing_search_total_list');
            return view('index')
            ->with('page_content', $index_content);
        }

    }




    public function create_new_user(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'mobile' => 'required|unique:admin,mobile|max:11',
            'username' => 'required|unique:admin,username',
            'email' => 'required|unique:admin,email',
            'password' => 'required',
            'office_id' => 'required',
                ], [
            'mobile.required' => 'You can\'t leave this empty.',
            'mobile.unique' => 'This mobile number already added.',
            'username.required' => 'You can\'t leave this empty.',
            'username.unique' => 'This mobile number already added.',
            'email.required' => 'You can\'t leave this empty.',
            'password.required' => 'You can\'t leave this empty.',
            'office_id.required' => 'You can\'t leave this empty.',
            'email.unique' => 'This mobile number already added.',
        ]);

        if ($validator->passes()):

            $data = array();
            $data['name'] = $request->name;
            $data['username'] = $request->username;
            $data['type'] = $request->type;
            $data['email'] = $request->email;
            $data['mobile'] = $request->mobile;
            $data['password'] = md5($request->password);
            $data['office_id'] = $request->office_id;

            //For Photo Upload

            $path = 'public/img/male.png';
            $data['photo'] = $path;
            
            DB::table('admin')->insert($data);
            return response()->json(['success' => '!!! New user successfully added. !!!']);
        else:
            return response()->json(['errors' => $validator->errors()]);
        endif;
    }


    public function create_new_office(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'office_name' => 'required|unique:offices,office_name',
                ], [
            'office_name.required' => 'You can\'t leave this empty.',
            'office_name.unique' => 'This office name already added.',
        ]);

        if ($validator->passes()):

            $data = array();
            $data['office_name'] = $request->office_name;
            $data['office_code'] = $request->office_code;
            $data['office_addr'] = $request->office_addr;
            $data['office_email'] = $request->office_email;
            $data['office_mobile'] = $request->office_mobile;
            
            DB::table('offices')->insert($data);
            return response()->json(['success' => '!!! New office successfully added. !!!']);
        else:
            return response()->json(['errors' => $validator->errors()]);
        endif;
    }


    public function update_user(Request $request)
    {

        $id = $request->id;
        $data = array();
        $password = $request->password;

        if($password != null){
            $data['name'] = $request->name;
            $data['username'] = $request->username;
            $data['email'] = $request->email;
            $data['mobile'] = $request->mobile;
            $data['password'] = md5($password);
            $data['type'] = $request->type;
            $data['office_id'] = $request->office_id;

            $update = DB::table('admin')->where('id', $id)->update($data);
            if($update){
                Session::put('message', '!!! User info successfully updated. !!!');
                return Redirect::to('/total-users-list');
            }else{
                Session::put('message', '!!! User info not successfully updated. !!!');
                return Redirect::to('/total-users-list');
            }
        }else{
            $data['name'] = $request->name;
            $data['username'] = $request->username;
            $data['email'] = $request->email;
            $data['mobile'] = $request->mobile;
            $data['type'] = $request->type;
            $data['office_id'] = $request->office_id;

            $update = DB::table('admin')->where('id', $id)->update($data);
            if($update){
                Session::put('message', '!!! User info successfully updated. !!!');
                return Redirect::to('/total-users-list');
            }else{
                Session::put('message', '!!! User info not successfully updated. !!!');
                return Redirect::to('/total-users-list');
            }
        }
    }

    public function update_office(Request $request)
    {

        $id = $request->id;
        $data = array();
        $data['office_name'] = $request->office_name;
        $data['office_code'] = $request->office_code;
        $data['office_addr'] = $request->office_addr;
        $data['office_email'] = $request->office_email;
        $data['office_mobile'] = $request->office_mobile; 

        $update = DB::table('offices')->where('id', $id)->update($data);
        if($update){
            Session::put('message', '!!! Office info successfully updated. !!!');
            return Redirect::to('/office-list');
        }else{
            Session::put('message', '!!! Office info not successfully updated. !!!');
            return Redirect::to('/office-list');
        }
    }



    public function create_new_driver(Request $request)
    {
        // $this->validate($request, User::$driver_added_validation_rules);
        // $data = $request->only('mobile', 'nid');

       $validator = Validator::make($request->all(), [
            'mobile' => 'required|unique:drivers|max:11',
            'dl_no' => 'required|unique:drivers|max:18',
            'tana_id' => 'required',
        ],[
            'mobile.required' => 'You can\'t empty this field',
            'mobile.unique' => 'This number already exist',
            'dl_no.unique' => 'This DL already exist',
            'dl_no.required' => 'You can\'t empty this field',
            'tana_id.required' => 'You should select police station',
        ]
    );

        if ($validator->fails()) {
            return redirect('/add-new-driver')
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($validator->passes()):

            $data = array();
            $data['dl_type'] = $request->dl_type;
            $data['dl_class'] = $request->dl_class;
            $data['dl_issue'] = $request->dl_issue;
            $data['gender'] = $request->gender;
            $data['name'] = $request->name;
            $data['fathers_name'] = $request->fathers_name;
            $data['mothers_name'] = $request->mothers_name;
            $data['mobile'] = $request->mobile;
            $data['dl_no'] = $request->dl_no;
            $data['dl_issue_date'] = $request->dl_issue_date;
            $data['date_of_birth'] = $request->date_of_birth;
            $data['blood'] = $request->blood;
            //$data['current_addr'] = $request->current_addr;
            //$data['permanent_addr'] = $request->permanent_addr;
            $data['tana_id'] = $request->tana_id;
            $data['expire_date'] = date('Y-m-d', strtotime("+1825 days"));
            $data['exam_date'] = $request->exam_date;
            $data['exam_time'] = $request->exam_time;
            $data['creator_id'] = Session::get('AdminId');
            $data['updator_id'] = Session::get('AdminId');
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');

            $rollCheck = DB::table('drivers')->where('exam_date', $data['exam_date'])->get();
            if(count($rollCheck) >= 1){
                foreach ($rollCheck as $dataCk) {
                    if ($data['exam_date'] == $dataCk->exam_date) {
                        if($dataCk->roll < 300){                            
                            $ExamDateCheck = DB::table('drivers')->where('exam_date', $data['exam_date'])->get();
                            foreach ($ExamDateCheck as $value) {
                                $data['roll'] = ($value->roll)+1;
                            }
                        }else if ($dataCk->roll == 300) {
                            $data['roll'] = 1;
                            $data['exam_date'] = date('Y-m-d', strtotime($dataCk->exam_date. ' + 2 days'));
                            $rollincrement = DB::table('drivers')->where('exam_date', $data['exam_date'])->get();

                            foreach ($rollincrement as $value) {
                                $data['roll'] = ($value->roll)+1;
                            }
                        }else{
                            $ExamDateCheck = DB::table('drivers')->where('exam_date', $data['exam_date'])->get();
                            foreach ($ExamDateCheck as $value) {
                                $data['roll'] = ($value->roll)+1;
                            }
                        }
                    }

                }
            }else{
                $data['roll'] = 1;
            }

            //For Photo Upload
            $time = time();
            // $file = $request->file('picture');
            // $filename = $time.$file->getClientOriginalName();

            // $path = 'public/img/drivers/';
            // $file->move($path, $filename);
            // $data['picture'] = $filename;
            
            $insert = DB::table('drivers')->insertGetId($data);
            if($insert){
                Session::put('message', '!!! New driver successfully added. !!!');
                $Driver_id = $insert; //insert id here after insert data
                Session::put('Driver_id', $Driver_id);
                //return Redirect::to('/upload-image-page/'.$Driver_id);
                return Redirect::to('/slip-exam-date-view/'.$Driver_id);
            }else{
                return back()->withInput();
            }
        else:
            return back()->withInput();
        endif;
 
    }

    public function add_image()
    {
        $index_content = view('add_image');
        return view('index')
            ->with('page_content', $index_content);
    }

    public function upload_image_page($id)
    {
        $Image = DB::table('snapshot')->orderBy('id', 'desc')->get();
        $index_content = view('upload_image')
                    ->with('Image', $Image)
                    ->with('driver_ID', $id);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function slip_exam_date_view($id)
    {
        $drivers = DB::table('drivers')
                    ->where('id', $id)
                    ->get();
        $index_content = view('slip_exam_date_view')
                    ->with('drivers', $drivers);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function invoice($id)
    {
        $drivers = DB::table('drivers')->
                    leftJoin('admin', 'drivers.creator_id', '=', 'admin.id')->
                    rightjoin('offices', 'admin.office_id', '=', 'offices.id')->
                    leftJoin('tanas', 'tanas.id', '=', 'drivers.tana_id')->
                    leftJoin('districts', 'districts.id', '=', 'tanas.dis_id')->
                    leftJoin('divisions', 'divisions.id', '=', 'districts.div_id')->
                    select('drivers.*', 'offices.office_name', 'tanas.tana_name', 'districts.dis_name', 'divisions.div_name')-> 
                    where('drivers.id', $id)->
                    get();
        return view('invoice')
                    ->with('drivers', $drivers);
    }

    public function upload_image(Request $request)
    {
        $data= array();
        $img = $request->image;
        $data['picture'] = $request->image;
        $driver_id = $request->driver_id;
        $old_path = public_path().'/img/temp/';
        $new_path = public_path().'/img/drivers/';


        File::move($old_path.$img, $new_path.$img);



        $update = DB::table('drivers')->where('id', $driver_id)->update($data);
        if($update){
            DB::table('snapshot')->delete();

            // if(File::exists($old_path.'*.jpg')) {
            //     File::delete($old_path.'*.jpg');
            // }
            $files = glob(public_path().'/img/temp/*'); //get all file names
            foreach($files as $file){
                if(is_file($file))
                unlink($file); //delete file
            }

            Session::put('message', '!!! Driver info completed. !!!');
            return Redirect::to('/success');
        }else{
            Session::put('error', '!!! Driver info not successfully completed. !!!');
            return Redirect::to('/success');
        }



    }


    public function success()
    {
        $index_content = view('success');
        return view('index')
            ->with('page_content', $index_content);
    }


    public function update_driver(Request $request){

            $id = $request->id;
            $data = array();

            // //For Photo Upload
            $time = time();
            $file = $request->file('picture');

            if($file != null){
                $data['dl_type'] = $request->dl_type;
                $data['dl_class'] = $request->dl_class;
                $data['dl_issue'] = $request->dl_issue;
                $data['gender'] = $request->gender;
                $data['name'] = $request->name;
                $data['fathers_name'] = $request->fathers_name;
                $data['mothers_name'] = $request->mothers_name;
                $data['mobile'] = $request->mobile;
                $data['dl_no'] = $request->dl_no;
                $data['dl_issue_date'] = $request->dl_issue_date;
                $data['date_of_birth'] = $request->date_of_birth;
                $data['blood'] = $request->blood;
                //$data['current_addr'] = $request->current_addr;
                //$data['permanent_addr'] = $request->permanent_addr;
                $data['tana_id'] = $request->tana_id;
                $data['expire_date'] = date('Y-m-d', strtotime("+1825 days"));
                $data['exam_date'] = $request->exam_date;
                $data['exam_time'] = $request->exam_time;
                $data['creator_id'] = Session::get('AdminId');
                $data['updator_id'] = Session::get('AdminId');
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['updated_at'] = date('Y-m-d H:i:s');
                $data['updator_id'] = Session::get('AdminId');

                //$img_query = DB::table('drivers')->where('id', $id)->first();
                // $filename = $img_query->picture;
                // $path = 'public/img/drivers/';
                // $file->move($path, $filename);
                // $data['picture'] = $filename;


                $update = DB::table('drivers')->where('id', $id)->update($data);
                if($update){
                    Session::put('message', '!!! Driver info successfully updated. !!!');
                    return Redirect::to('/edit-driver-info/'.$id);
                }else{
                    Session::put('message', '!!! Driver info not successfully updated. !!!');
                    return Redirect::to('/edit-driver-info/'.$id);
                }
            }else{
                $data['dl_type'] = $request->dl_type;
                $data['dl_class'] = $request->dl_class;
                $data['dl_issue'] = $request->dl_issue;
                $data['gender'] = $request->gender;
                $data['name'] = $request->name;
                $data['fathers_name'] = $request->fathers_name;
                $data['mothers_name'] = $request->mothers_name;
                $data['mobile'] = $request->mobile;
                $data['dl_no'] = $request->dl_no;
                $data['dl_issue_date'] = $request->dl_issue_date;
                $data['date_of_birth'] = $request->date_of_birth;
                $data['blood'] = $request->blood;
                //$data['current_addr'] = $request->current_addr;
                //$data['permanent_addr'] = $request->permanent_addr;
                $data['tana_id'] = $request->tana_id;
                $data['expire_date'] = date('Y-m-d', strtotime("+1825 days"));
                $data['exam_date'] = $request->exam_date;
                $data['exam_time'] = $request->exam_time;
                $data['creator_id'] = Session::get('AdminId');
                $data['updator_id'] = Session::get('AdminId');
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['updated_at'] = date('Y-m-d H:i:s');
                $data['updator_id'] = Session::get('AdminId');

                $rollCheck = DB::table('drivers')->where('exam_date', $data['exam_date'])->get();
            if(count($rollCheck) >= 1){
                foreach ($rollCheck as $dataCk) {
                    if ($data['exam_date'] == $dataCk->exam_date) {
                        if($dataCk->roll < 300){                            
                            $ExamDateCheck = DB::table('drivers')->where('exam_date', $data['exam_date'])->get();
                            foreach ($ExamDateCheck as $value) {
                                $data['roll'] = ($value->roll)+1;
                            }
                        }else if ($dataCk->roll == 300) {
                            $data['roll'] = 1;
                            $data['exam_date'] = date('Y-m-d', strtotime($dataCk->exam_date. ' + 2 days'));
                            $rollincrement = DB::table('drivers')->where('exam_date', $data['exam_date'])->get();
                            
                            foreach ($rollincrement as $value) {
                                $data['roll'] = ($value->roll)+1;
                            }
                        }else{
                            $ExamDateCheck = DB::table('drivers')->where('exam_date', $data['exam_date'])->get();
                            foreach ($ExamDateCheck as $value) {
                                $data['roll'] = ($value->roll)+1;
                            }
                        }
                    }

                }
            }else{
                $data['roll'] = 1;
            }


                $update = DB::table('drivers')->where('id', $id)->update($data);
                if($update){
                    Session::put('message', '!!! Driver info successfully updated. !!!');
                    return Redirect::to('/edit-driver-info/'.$id);
                }else{
                    Session::put('message', '!!! Driver info not successfully updated. !!!');
                    return Redirect::to('/edit-driver-info/'.$id);
                }
            }
            

 
    }


    public function total_drivers_list() {
        $drivers = DB::table('drivers')->get();
        $index_content = view('total_drivers_list')->with('drivers', $drivers);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function total_users_list() {
        $users = DB::table('admin')->
                    join('offices', 'admin.office_id', '=', 'offices.id')->
                    select('admin.*', 'offices.office_name')->                    
                    whereNotIn('admin.id', [1,2])->
                    get();
        $index_content = view('total_users_list')->with('users', $users);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function office_list() {
        $offices = DB::table('offices')->whereNotIn('id', [1])->get();
        $index_content = view('office_list')->with('offices', $offices);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function driver_details($id) {
        $drivers = DB::table('drivers')->where('id', $id)->get();
        $index_content = view('driver_details')->with('drivers', $drivers);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function edit_driver_info($id) {
        $drivers = DB::table('drivers')->
                        where('id', $id)->
                        get();
        foreach ($drivers as $driver) {
           $tana = DB::table('tanas')->
                        where('id', $driver->tana_id)->
                        get(); 
        }

        
        $tanas = DB::table('tanas')->
                    leftJoin('districts', 'tanas.dis_id', '=', 'districts.id')->
                    select('tanas.*', 'districts.dis_name')->
                    orderby('districts.dis_name', 'asc')->
                    get();
        $districts = DB::table('districts')->orderby('dis_name', 'asc')->get();
        $divisions = DB::table('divisions')->
                        orderby('divisions.div_name', 'asc')->
                        get();
        $index_content = view('edit_driver_info')
                    ->with('drivers', $drivers)
                    ->with('tana', $tana)
                    ->with('tanas', $tanas)
                    ->with('districts', $districts)
                    ->with('divisions', $divisions);

        return view('index')
            ->with('page_content', $index_content);
    }

    public function edit_user_info($id) {
        $users = DB::table('admin')->where('id', $id)->get();
        $offices = DB::table('offices')->get();
        $index_content = view('edit_user_info')->
                            with('users', $users)->
                            with('offices', $offices);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function edit_office_info($id) {
        $offices = DB::table('offices')->where('id', $id)->get();
        $index_content = view('edit_office_info')->with('offices', $offices);
        return view('index')
            ->with('page_content', $index_content);
    }


    public function driver_exam_listed($id){
        $update = DB::table('drivers')
            ->where('id', $id)
            ->update(['exam_listed' => $id]);
        if($update){
            Session::put('message', 'Driver Listed successfully!!!');
            return back();
        }else{
            Session::put('error', 'Driver not Listed!!!');
        }
    }

    public function delete_driver_info($id){
        $delete = DB::table('drivers')
                    ->where('id', $id)
                    ->delete();
        if($delete){
            Session::put('message', 'Driver information deleted successfully!!!');
            return Redirect::to('/total-drivers-list');
        }else{
            Session::put('error', 'Driver information not deleted successfully!!!');
        }
    }


    public function delete_user_info($id){
        $delete = DB::table('admin')
                    ->where('id', $id)
                    ->delete();
        if($delete){
            Session::put('message', 'User information deleted successfully!!!');
            return Redirect::to('/total-users-list');
        }else{
            Session::put('error', 'User information not deleted successfully!!!');
        }
    }

    public function delete_office_info($id){
        $delete = DB::table('offices')
                    ->where('id', $id)
                    ->delete();
        if($delete){
            Session::put('message', 'office information deleted successfully!!!');
            return Redirect::to('/office-list');
        }else{
            Session::put('error', 'office information not deleted successfully!!!');
        }
    }


    public function drivers_list_by_date_searrch($dl_type){
        $drivers = DB::table('drivers')->where('dl_type', $dl_type)->get();
        $index_content = view('drivers_list_by_date_searrch')->with('drivers', $drivers);
        return view('index')
            ->with('page_content', $index_content);
    }


    public function total_prof_driver() {
        $drivers = DB::table('drivers')->where('dl_type', 'prof')->get();
        $index_content = view('total_prof_driver')->with('drivers', $drivers);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function total_nonprof_driver() {
        $drivers = DB::table('drivers')->where('dl_type', 'non-prof')->get();
        $index_content = view('total_nonprof_driver')->with('drivers', $drivers);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function light_class_driver() {
        $drivers = DB::table('drivers')->where('dl_class', 'light')->get();
        $index_content = view('total_light_driver')->with('drivers', $drivers);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function light_mtrcycle_driver() {
        $drivers = DB::table('drivers')->where('dl_class', 'lightmotorcycle')->get();
        $index_content = view('total_lightmotorcycle')->with('drivers', $drivers);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function total_medium_driver() {
        $drivers = DB::table('drivers')->where('dl_class', 'medium')->get();
        $index_content = view('total_medium_driver')->with('drivers', $drivers);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function total_heavy_driver() {
        $drivers = DB::table('drivers')->where('dl_class', 'heavy')->get();
        $index_content = view('total_heavy_driver')->with('drivers', $drivers);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function total_psv_driver() {
        $drivers = DB::table('drivers')->where('dl_class', 'psv')->get();
        $index_content = view('total_psv_driver')->with('drivers', $drivers);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function total_new_driver() {
        $drivers = DB::table('drivers')->where('dl_issue', 'new')->get();
        $index_content = view('total_new_driver')->with('drivers', $drivers);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function total_renew_driver() {
        $drivers = DB::table('drivers')->where('dl_issue', 'renew')->get();
        $index_content = view('total_renew_driver')->with('drivers', $drivers);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function prof_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('dl_type', 'prof')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('dl_type', 'prof')
                ->get(); 
        }
        $index_content = view('prof_driver')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function nonprof_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('dl_type', 'non-prof')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('dl_type', 'non-prof')
                ->get(); 
        }
        $index_content = view('nonprof_driver')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function light_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('dl_type', 'light')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('dl_class', 'light')
                ->get(); 
        }
        $index_content = view('light_driver')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function lightmotorcycle_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('dl_type', 'lightmotorcycle')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('dl_class', 'lightmotorcycle')
                ->get(); 
        }
        $index_content = view('lightmotorcycle_driver')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function medium_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('dl_type', 'medium')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('dl_class', 'medium')
                ->get(); 
        }
        $index_content = view('medium_driver')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function heavy_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('dl_type', 'heavy')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('dl_class', 'heavy')
                ->get(); 
        }
        $index_content = view('heavy_driver')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function psv_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('dl_type', 'psv')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('dl_class', 'psv')
                ->get(); 
        }
        $index_content = view('psv_driver')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function new_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('dl_issue', 'new')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('dl_issue', 'new')
                ->get(); 
        }
        $index_content = view('new_driver')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function renew_driver_search($start_date, $end_date) {
        if($start_date == $end_date){
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '=', $start_date]
                ])
                ->where('dl_issue', 'renew')
                ->get();
        }else{
            $drivers = DB::table('drivers')
                ->where([
                    ['created_at', '>=', $start_date], 
                    ['created_at', '<=', $end_date]
                ])
                ->where('dl_issue', 'renew')
                ->get(); 
        }
        $index_content = view('renew_driver')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }

    public function total_driver_search($start_date, $end_date) {
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
        $index_content = view('total_driver_by_search')
                        ->with('drivers', $drivers)
                        ->with('start_date', $start_date)
                        ->with('end_date', $end_date);
        return view('index')
            ->with('page_content', $index_content);
    }







    
    public function logoutAdmin() {
        Session::put('scl_code', null);
        Session::put('AdminId', null);
        Session::put('message', 'You are successfully logout');
        return Redirect::to('/');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
