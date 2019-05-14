@extends('index')
@section('page_content')
@section('title', 'Add New Driver')

<style>

input[type="radio"], input[type="checkbox"] {
    /* margin: 4px 0 0; */
    margin: 0px 0px 0px 15px !important;
    line-height: normal;
}
#camera {
  width: 100%;
  height: 350px;
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
                       <li class="active">
                           @yield('title')
                       </li>
                       <li class="pull-right search-wrap">{{-- 
                           <form action="" class="hidden-phone">
                               <div class="input-append search-input-area">
                                   <input class="" id="appendedInputButton" type="text">
                                   <button class="btn" type="button"><i class="icon-search"></i> </button>
                               </div>
                           </form> --}}
                       </li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            @if (count($errors))
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <!-- BEGIN PAGE CONTENT-->
                                 <?php
                                    $message = Session::get('message');
                                    $error = Session::get('error');
                                  ?>
                                @if ($message)
                                  <div class="text-center alert alert-success">
                                    {{ $message }}
                                    {{ Session::put('message', null) }}
                                 </div>
                                @endif

                                @if ($error)
                                  <div class="text-center alert alert-success">
                                    {{ $error }}
                                    {{ Session::put('error', null) }}
                                 </div>
                                @endif
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
                              <div class="alert alert-success print-success-msg text-center" style="display: none;"></div>

                              <form action="{{ url('/create-new-driver') }}" method="post" id=""  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <table class="table table-bordered">
                                  <tr>
                                    <td>Select Driving Licence Type</td>
                                    <td>
                                        <div id="dl_type">
                                          <input type="radio" value="pro" name="dl_type"  required="required" checked="checked">Professional
                                          <input type="radio" value="n-pro" name="dl_type"  required="required">Non-Professional
                                        </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Select Driver Licence Issue</td>
                                    <td>
                                      <div id="dl_issue">
                                          <input type="radio" value="rnw" name="dl_issue"  required="required" checked="checked">Renew
                                        <input type="radio" value="nw" name="dl_issue"  required="required">New
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Select Gender</td>
                                    <td>
                                      <div id="dl_issue">
                                        <input type="radio" value="m" name="gender"  required="required" checked="checked">Male
                                          <input type="radio" value="f" name="gender"  required="required">Female
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Select Driver Licence Vehicle Class</td>
                                    <td>
                                      <div id="dl_class">
                                        <input type="radio" value="lt" name="dl_class" id="dl_class">Light
                                        <input type="radio" value="ltcy" name="dl_class"  required="required">Light and Motorcycle
                                          <input type="radio" value="mdm" name="dl_class"  required="required">Medium
                                          <input type="radio" value="hv" name="dl_class"  required="required">Heavy
                                          <input type="radio" value="psv" name="dl_class"  required="required">PSV
                                        </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Driver Name</td>
                                    <td>
                                        <input type="text" name="name" value="" id="name" placeholder="Enter Driver Name" class="input-xxlarge" required="required">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Father's Name</td>
                                    <td>
                                        <input type="text" name="fathers_name" value="" id="fathers_name" placeholder="Enter Father's Name" class="input-xxlarge" required="required">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Mobile No.</td>
                                    <td>
                                        <input type="text" name="mobile" value="" id="mobile" placeholder="Enter Mobile No. (Exmp: 018********)" class="input-xxlarge" autocomplete="off">
                                        
                                      <span class="help-block">
                                          <strong style="color: red">{{ $errors->first('mobile') }}</strong>
                                      </span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Driving Licence No.</td>
                                    <td>
                                        <input type="text" name="dl_no"  value="" id="dl_no" placeholder="Enter Driving Licence No." class="input-xxlarge" autocomplete="off">
                                      <span class="help-block">
                                          <strong style="color: red">{{ $errors->first('dl_no') }}</strong>
                                      </span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Blood Group</td>
                                    <td>
                                        <input type="text" name="blood" value="" id="blood" placeholder="Enter Driving Licence No." class="input-xxlarge" autocomplete="off">
                                      <span class="help-block">
                                          <strong style="color: red">{{ $errors->first('blood') }}</strong>
                                      </span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Date of Birth</td>
                                    <td>
                                        <input type="text" name="date_of_birth" value="" id="datepicker1" placeholder="Enter date of birth" autocomplete="off">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Driving License Issue Date</td>
                                    <td>
                                        <input type="text" name="dl_issue_date" value="" id="datepicker4" placeholder="Enter Driving License Issue Date" autocomplete="off">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Driving License Expire Date</td>
                                    <td>
                                        <input type="text" name="expire_date" value="" id="datepicker3" placeholder="Enter date of birth" autocomplete="off">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Exam Date</td>
                                    <td>
                                        <input type="text" name="exam_date" value="" id="datepicker2" placeholder="Enter exam date" required="required" autocomplete="off">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Exam Time</td>
                                    <td>
                                        <input type="text" name="exam_time" value="" placeholder="Enter exam time" required="required" autocomplete="off">
                                    </td>
                                  </tr>
                               {{--    <tr>
                                    <td>Permanent Address: (Only District)</td>
                                    <td>
                                        <input type="text" name="permanent_addr" id="permanent_addr" placeholder="Enter Permanent Address" class="input-xxlarge">
                                    </td>
                                  </tr> --}}

                                  <tr>
                                    <td>Permanent Address:</td>
                                    <td>
                                      <select name="create_tana_division_id" id="create_tana_division_id" onchange="ajaxGET('create_tana_dist_id','{{URL::to('/districts/')}}/'+this.value)" class="form-control">
                                          <option value="" selected="selected" disabled="disabled">Select Division</option>
                                          @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->div_name }}</option>
                                          @endforeach
                                      </select>
                                      <br>

                                      <select name="create_tana_dist_id" id="create_tana_dist_id" class="form-control" onchange="ajaxGET('tana_id','{{URL::to('/tanas/')}}/'+this.value)" >
                                          <option value="">Select District</option>
                                      </select>
                                      <br>
                                      <select name="tana_id" id="tana_id" class="form-control">
                                          <option value="">Select Police Station</option>
                                      </select>
                                      <span class="help-block">
                                          <strong style="color: red">{{ $errors->first('tana_id') }}</strong>
                                      </span>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td>Sumission</td>
                                    <td>
                                        <input type="submit" class="btn btn-primary" value="Add Driver">
                                    </td>
                                  </tr>
                                </table>

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
                    document.getElementById(div).innerHTML = '<option value="">Select Division First</option>';
                    $('#' + div).css('color', 'red');
                } else if (div == 'tana_id') {
                    document.getElementById(div).innerHTML = '<option value="">Select District First</option>';
                    $('#' + div).css('color', 'red');
                }
            }
        };
        xmlhttp.open("GET", url, true);
        xmlhttp.send(data);
    }
</script>



@endsection