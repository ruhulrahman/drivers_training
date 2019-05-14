@extends('index')
@section('page_content')
@section('title', 'Police Station Create')




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
                           Locatione
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

<!--main content start-->
      <section id="">
          <section class="page-wraper">
              <!-- page start-->
            <div class="row-fluid">
              <div class="span12">                
                <!---------- Menu---------->
                @include('location.menu')
              </div>
            </div>
            <div class="row-fluid">
            <div class="span6">
              <section class="widget red">
                  <div class="widget-title">
                      <h4><i class="icon-reorder"></i> @yield('title')</h4>
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                    </span>
                  </div>

                <div class="widget-body">
                  
                <div class="alert alert-success print-success-msg text-center" style="display: none;"></div>
                    <form id="dm_form" action="{{ url('/tana-create') }}" method="post" class="form-inline" role="form">
                      @csrf
                      <table class="table table-bordered">
                                  <tr>
                                    <td>Select Division</td>
                                    <td>
                                      <select name="create_tana_division_id" id="create_tana_division_id" onchange="ajaxGET('create_tana_dist_id','{{URL::to('/districts/')}}/'+this.value)" class="form-control">
                                          <option value="" selected="selected" disabled="disabled">Select Division</option>
                                          @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->div_name }}</option>
                                          @endforeach
                                      </select>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>District Name</td>
                                    <td>
                                      <select name="create_tana_dist_id" id="create_tana_dist_id" class="form-control">
                                          <option value="">Select District</option>
                                      </select>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Tana Name</td>
                                    <td>
                                        <input type="text" name="tana_name" class="form-control" id="tana_name" placeholder="Enter tana Name">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Sumission</td>
                                    <td>
                                        <input type="submit" class="btn btn-primary" value="Add New tana">
                                    </td>
                                  </tr>
                                </table>
                    </form>

                </div>
              </section>
            </div>

              <div class="span6">
                              <?php
                                $message = Session::get('message');
                              ?>
                            @if ($message)
                              <div class="text-center alert alert-success">
                                {{ $message }}
                                {{ Session::put('message', null) }}
                             </div>
                            @endif
                <section class="widget">
                    <header class="widget-title">
                        <h4><i class="icon-reorder"></i> Police Station List</h4>
                    </header>

                  <div class="widget-body">
                          <div class="widget-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th>SL.</th>
                                          <th>Tana Name</th>
                                          <th class="center">Action</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                        <?php $i = 1; ?>
                  @foreach ($tanas as $tana)
                                      <tr>
                                          <td>{{ $i++ }}</td>
                                          <td>{{ $tana->dis_name.", ".$tana->tana_name }}</td>
                                          <td>
                                            <a class="btn btn-primary" href="{{ url('/tana-edit') }}/{{ $tana->id }}">Edit</a> || 
                                            <a class="btn btn-danger" href="{{ url('/tana-delete') }}/{{ $tana->id }}">Delete</a>
                                          </td>
                                      </tr>
                  @endforeach

                                      </tbody>
                          </table>
                                </div>
                          </div>
                  </div>
                </section>
              </div>
            </div>




              
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->



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
                } else if (div == 'org_cty') {
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