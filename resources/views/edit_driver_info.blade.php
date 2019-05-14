@extends('index')
@section('page_content')
@section('title', 'Edit Driver\'s Information')

<style>

input[type="radio"], input[type="checkbox"] {
    /* margin: 4px 0 0; */
    margin: 0px 0px 0px 15px !important;
    line-height: normal;
}
</style>

            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     @yield('title') Page
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="{{ url('/') }}">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           Drivers Manage
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="{{ url('/total-drivers-list') }}">Total Drivers Lists</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           @yield('title')
                       </li>
                       <li class="pull-right search-wrap">
                       </li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->

            <div id="page-wraper">
                <div class="row-fluid">
                    <div class="span9">
                        <!-- BEGIN BASIC PORTLET-->
                        <div class="widget red">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> @yield('title')</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                            </div>
                            <div class="widget-body">
                                <?php
                                    $message = Session::get('message');
                                  ?>
                                @if ($message)
                                  <div class="text-center alert alert-success">
                                    {{ $message }}
                                    {{ Session::put('message', null) }}
                                 </div>
                                @endif
                              <form action="{{ url('/update-driver') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @foreach ($drivers as $driver)

                                <input type="hidden" name="id" value="{{ $driver->id }}">
                                
                                <table class="table table-bordered">
                                  <tr>
                                    <td>Select Driving Licence Type</td>
                                    <td>
                                        <div id="dl_type">
                                          @if ($driver->dl_type == 'pro')
                                          <input type="radio" value="pro" name="dl_type" checked="checked">Professional
                                          <input type="radio" value="n-pro" name="dl_type">Non-Professional
                                           @endif

                                          @if ($driver->dl_type == 'n-pro')
                                            <input type="radio" value="pro" name="dl_type" >Professional
                                            <input type="radio" value="n-pro" name="dl_type" checked="checked">Non-Professional
                                           @endif
                                        </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Select Driver Licence Vehicle Class</td>
                                    <td>
                                      <div id="dl_class">
                                        @if ($driver->dl_class == 'lt')
                                          <input type="radio" value="lt" name="dl_class" checked="checked">Light
                                        <input type="radio" value="ltcy" name="dl_class">Light and Motorcycle
                                          <input type="radio" value="mdm" name="dl_class">Medium
                                          <input type="radio" value="hv" name="dl_class">Heavy
                                          <input type="radio" value="psv" name="dl_class">PSV
                                        @elseif($driver->dl_class == 'ltcy')
                                          <input type="radio" value="lt" name="dl_class">Light
                                          <input type="radio" value="ltcy" name="dl_class" checked="checked">Light and Motorcycle
                                          <input type="radio" value="mdm" name="dl_class">Medium
                                          <input type="radio" value="hv" name="dl_class">Heavy
                                          <input type="radio" value="psv" name="dl_class">PSV
                                        @elseif($driver->dl_class == 'mdm')  
                                          <input type="radio" value="lt" name="dl_class">Light
                                          <input type="radio" value="ltcy" name="dl_class">Light and Motorcycle
                                          <input type="radio" value="mdm" name="dl_class" checked="checked">Medium
                                          <input type="radio" value="hv" name="dl_class">Heavy
                                          <input type="radio" value="psv" name="dl_class">PSV
                                        @elseif($driver->dl_class == 'hv')
                                          <input type="radio" value="lt" name="dl_class">Light
                                          <input type="radio" value="ltcy" name="dl_class">Light and Motorcycle
                                          <input type="radio" value="mdm" name="dl_class">Medium
                                          <input type="radio" value="hv" name="dl_class" checked="checked">Heavy
                                          <input type="radio" value="psv" name="dl_class">PSV
                                        @elseif($driver->dl_class == 'psv')
                                          <input type="radio" value="lt" name="dl_class">Light
                                          <input type="radio" value="ltcy" name="dl_class">Light and Motorcycle
                                          <input type="radio" value="mdm" name="dl_class">Medium
                                          <input type="radio" value="hv" name="dl_class">Heavy
                                          <input type="radio" value="psv" name="dl_class" checked="checked">PSV
                                        @endif
                                        </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Select Driver Licence Issue</td>
                                    <td>
                                      <div id="dl_issue">
                                        @if($driver->dl_issue == 'nw')
                                          <input type="radio" value="nw" name="dl_issue" checked="checked">New
                                          <input type="radio" value="rnw" name="dl_issue">Renew
                                        @elseif($driver->dl_issue == 'rnw')
                                          <input type="radio" value="nw" name="dl_issue">New
                                          <input type="radio" value="rnw" name="dl_issue" checked="checked">Renew
                                        @endif
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Select Gender</td>
                                    <td>
                                      <div id="dl_issue">
                                        @if ($driver->gender == 'm')
                                          <input type="radio" value="m" name="gender"  required="required" checked="checked">Male
                                          <input type="radio" value="f" name="gender"  required="required">Female
                                        @else
                                        <input type="radio" value="m" name="gender"  required="required">Male
                                          <input type="radio" value="f" name="gender"  required="required" checked="checked">Female
                                        @endif
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Driver Name</td>
                                    <td>
                                        <input type="text" name="name" value="{{ $driver->name }}" id="name" placeholder="Enter Driver Name" class="input-xxlarge">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Father's Name</td>
                                    <td>
                                        <input type="text" name="fathers_name" value="{{ $driver->fathers_name }}" id="fathers_name" placeholder="Enter Father's Name" class="input-xxlarge">
                                    </td>
                                  </tr>
                                  {{-- <tr>
                                    <td>Mother's Name</td>
                                    <td>
                                        <input type="text" name="mothers_name" value="{{ $driver->mothers_name }}" id="mothers_name" placeholder="Enter Mother's Name" class="input-xxlarge">
                                    </td>
                                  </tr> --}}
                                  <tr>
                                    <td>Mobile No.</td>
                                    <td>
                                        <input type="text" name="mobile" value="{{ $driver->mobile }}" id="mobile" placeholder="Enter Mobile No. (Exmp: 018********)" class="input-xxlarge">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Driving Licence No..</td>
                                    <td>
                                        <input type="text" name="dl_no" value="{{ $driver->dl_no }}" id="dl_no" placeholder="Enter Driving Licence No." class="input-xxlarge">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Blood Group</td>
                                    <td>
                                        <input type="text" name="blood" value="{{ $driver->blood }}" id="blood" placeholder="Enter Blood Group (Exmp: B+)">
                                    </td>
                                  </tr>
                                  <tr>
                                  <tr>
                                    <td>Date of Birth</td>
                                    <td>
                                        <input type="text" name="date_of_birth" value="{{ $driver->date_of_birth }}" id="datepicker1" placeholder="Enter dl_no No." >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Driving License Issue Date</td>
                                    <td>
                                        <input type="text" name="dl_issue_date" value="{{ $driver->dl_issue_date }}" id="datepicker4" placeholder="Enter Driving License Issue Date" autocomplete="off">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Driving License Expire Date</td>
                                    <td>
                                        <input type="text" name="expire_date" value="{{ $driver->expire_date }}" id="datepicker3" placeholder="Enter date of birth" autocomplete="off">
                                    </td>
                                  </tr>
                                  <tr>
                                  <tr>
                                    <td>Exam Date</td>
                                    <td>
                                        <input type="text" name="exam_date" value="{{ $driver->exam_date }}" id="datepicker1" placeholder="Enter Exam Date" >
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>Exam Time</td>
                                    <td>
                                        <input type="text" name="exam_time" value="{{ $driver->exam_time }}" placeholder="Enter exam time" required="required" autocomplete="off">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Permanent Address:</td>
                                    <td>
                                      @foreach ($tana as $thn)
                                      <select name="create_tana_division_id" id="create_tana_division_id" onchange="ajaxGET('create_tana_dist_id','{{URL::to('/districts/')}}/'+this.value)" class="form-control">
                                          <option value="" selected="selected" disabled="disabled">Select Division</option>
                                          @foreach ($divisions as $division)
                                            <?php
                    $div = DB::table('divisions')->
                    rightJoin('districts', 'divisions.id', '=', 'districts.div_id')->
                    leftJoin('tanas', 'districts.id', '=', 'tanas.dis_id')->
                    where('tanas.id', $thn->id)->
                    orderby('divisions.div_name', 'asc')->
                    select('divisions.id')->
                    get();
                                            ?>
                                            @foreach($div as $dv)
                                            @if($dv->id == $division->id)
                                              <option value="{{ $division->id }}" selected="selected">{{ $division->div_name }}</option>
                                            @else
                                              <option value="{{ $division->id }}">{{ $division->div_name }}</option>
                                            @endif
                                            @endforeach
                                          @endforeach
                                      </select>
                                      <br>

                                      <select name="create_tana_dist_id" id="create_tana_dist_id" class="form-control" onchange="ajaxGET('tana_id','{{URL::to('/tanas/')}}/'+this.value)">
                                        <?php
                                          $dis = DB::table('districts')->
                                                where('districts.id', $thn->dis_id)->
                                                orderby('dis_name', 'asc')->
                                                get(); 
                                        ?>
                                      @foreach($districts as $district)
                                            @if($district->id == $thn->dis_id)
                                              <option value="{{ $district->id }}" selected="selected">{{ $district->dis_name }}</option>
                                            @endif
                                       @endforeach
                                      </select>
                                      <br>
                                      <select name="tana_id" id="tana_id" class="form-control">
                                        @foreach($tanas as $tana)
                                            @if($tana->id == $thn->dis_id)
                                              <option value="{{ $tana->id }}" selected="selected">{{ $tana->tana_name }}</option>
                                            @endif
                                       @endforeach
                                      </select>
                                       @endforeach
                                    </td>
                                  </tr>
                                  {{-- <tr>
                                    <td>Photo Upload</td>
                                    <td>
                                        <input type="file" name="picture"><br>
                                        <img src="{{ asset('public/img/drivers/') }}/{{ $driver->picture }}" width="70px" height="70px" alt="">
                                    </td>
                                  </tr> --}}
                                  <tr>
                                    <td>Sumission</td>
                                    <td>
                                        <input type="submit" class="btn btn-primary" value="Update">
                                </div>
                                    </td>
                                  </tr>
                                </table>
                                @endforeach
                                </form>
                            </div>
                        </div>
                        <!-- END BASIC PORTLET-->
                    </div>
                </div>

<script type="text/javascript">
    function ajaxGET(div, url, data) {
        var xmlhttp;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function () {
            $('#' + div).html("").css('color', '#000');
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                $('#' + div).append(xmlhttp.responseText);
//                document.getElementById(div).innerHTML = xmlhttp.responseText;
            } else {
                if (div == 'create_dist_division_id' || div == 'create_tana_division_id') {
                    document.getElementById(div).innerHTML = '<option value="">Select Country First</option>';
                    $('#' + div).css('color', 'red');
                } else if (div == 'create_tana_dist_id') {
                    document.getElementById(div).innerHTML = '<option value="">Select Division/State First</option>';
                    $('#' + div).css('color', 'red');
                } else if (div == 'tana_id') {
                    document.getElementById(div).innerHTML = '<option value="">Select Division/State First</option>';
                    $('#' + div).css('color', 'red');
                }
            }
        };
        xmlhttp.open("GET", url, true);
        xmlhttp.send(data);
    }
</script>


@endsection