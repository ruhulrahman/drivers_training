@extends('index')
@section('page_content')
@section('title', 'Find Place')
<style>
  #searching_name{
    width: 95%;
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
                           Location
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
              
                  

                    <form action="{{ url('/find-place') }}" method="get" class="form-inline" role="form">
                      @csrf
                        <div class="form-group col-lg-4">
                            <label class="sr-only" for="searching_name">Country Name</label>
                            <input type="text" name="searching_name" class="form-control" id="searching_name" placeholder="Search Division, District and Police Station by name">
                        </div><br>
                        <button type="submit" class="btn btn-success">Search Place</button>
                    </form>

                </div>
              </section>
                            <?php
                                $message = Session::get('message');
                              ?>
                            @if ($message)
                              <div class="text-center alert alert-success">
                                {{ $message }}
                                {{ Session::put('message', null) }}
                             </div>
                            @endif
                          <div class="">
                                <div class="adv-table">
                                  @if (isset($tanas) || isset($districts) || isset($divisions))
                                    @if(count($tanas) > 0 || count($districts) > 0 || count($divisions) > 0)
                                    <table id="datatable" class="table table-striped table-hover table-bordered" id="editable-sample">
                                     <thead>
                                      <tr>
                                          <th>SL.</th>
                                          <th>Thana/Districit/Division Name</th>
                                          <th class="center">Action</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                        $i = 1;
                                      ?>

                                      
                                  

                                    @foreach ($tanas as $tana)
                                      <tr class="">
                                           <td>{{ $i++ }}</td>
                                           <td>{{ $tana->tana_name.", ".$tana->dis_name.", ".$tana->div_name." Division" }}</td>
                                           <td>
                                            <a class="btn btn-primary" href="{{ url('/thana-edit') }}/{{ $tana->id }}"><i class="icon-pencil"></i></a> ||
                                          <a class="btn btn-danger" href="{{ url('/thana-delete') }}/{{ $tana->id }}"><i class="icon-trash"></i></a></td>
                                      </tr>
                                    @endforeach


                                      @foreach ($districts as $dis)
                                      <tr class="">
                                           <td>{{ $i++ }}</td>
                                           <td>{{ $dis->dis_name.", ".$dis->div_name." Division" }}</td>
                                           <td>
                                            <a class="btn btn-primary" href="{{ url('/district-edit') }}/{{ $dis->id }}"><i class="icon-pencil"></i></a> ||
                                          <a class="btn btn-danger" href="{{ url('/district-delete') }}/{{ $dis->id }}"><i class="icon-trash"></i></a></td>
                                       </tr>
                                      @endforeach


                                      @foreach ($divisions as $div)
                                      <tr class="">
                                           <td>{{ $i++ }}</td>
                                           <td>{{ $div->div_name." Division" }}</td>
                                           <td>
                                            <a class="btn btn-primary" href="{{ url('/division-edit') }}/{{ $div->id }}"><i class="icon-pencil"></i></a> ||
                                          <a class="btn btn-danger" href="{{ url('/division-delete') }}/{{ $div->id }}"><i class="icon-trash"></i></a></td>
                                       </tr>
                                       @endforeach
                                    @elseif(count($tanas) == 0)
                                       <tr class="aler alert-danger">
                                           <td colspan="7" style="text-align: center;">Data Not Found!!</td>
                                       </tr>
                                    @endif
                                  @endif


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
                if (div == 'create_dist_division_id' || div == 'create_thana_division_id') {
                    document.getElementById(div).innerHTML = '<option value="">Select Country First</option>';
                    $('#' + div).css('color', 'red');
                } else if (div == 'create_thana_dist_id') {
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