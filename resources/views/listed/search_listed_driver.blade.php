@extends('index')
@section('page_content')
@section('title', 'Listed Driver Search')



<style>
  table tr th{text-align: center !important;}
  table tr td{text-align: center !important;}
  .search-input-area input{
    width: 300px;
  }  .search-input-area input:focus{
    width: 800px;
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
            <!-- BEGIN EDITABLE TABLE widget-->
             <div class="row-fluid">
                 <div class="span12">
                     <!-- BEGIN EXAMPLE TABLE widget-->
                     <div class="widget green">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i> @yield('title')</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                         </div>
                         <div class="widget-body">
                             <div>
                                  <div class="search_clue">
                                    <h4>You can search a driver by <b>name</b>, <b>mobile number</b>, <b>driving licence no.</b> and <b>date of birth</b>.</h4>
                                  </div>
                                 <div class="clearfix">
                                 </div>
                                 <div class="space15"></div>
                                 <?php
                                    $message = Session::get('message');
                                  ?>
                                @if ($message)
                                  <div class="text-center alert alert-success">
                                    {{ $message }}
                                    {{ Session::put('message', null) }}
                                 </div>
                                @endif
                          <div class="pull-right search-wrap">
                           <form action="{{ url('/search-listed-driver') }}" method="get" class="hidden-phone">
                            {{ csrf_field() }}
                               <div class="input-append search-input-area form-inline">
                                  <label for="search">Data Search: </label>
                                   <input class="" name="search" id="search" type="text" placeholder="Search Exmp: Date: 1990-01-25">
                                   <button class="btn" type="submit"><i class="icon-search"></i> </button>
                               </div>
                           </form>
                           </div>
                                 <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                     <thead>
                                     <tr style="text-align: center; background: #dddddd">
                                         <th>SL.</th>
                                         <th>Name</th>
                                         <th>Driving Licence</th>
                                         <th>Mobile</th>
                                         <th>Singnature</th>
                                         <th>Photo</th>
                                         <th>Roll</th>
                                         <th>Exam Date</th>
                                         <th class="no-print">Details</th>
                                         <th class="no-print">Action</th>
                                     </tr>
                                     </thead>
                                     <tbody>
                                      <?php
                                        $i = 1;
                                      ?>
                                      @if (count($drivers) > 0)
                                        @foreach ($drivers as $driver)
                                       <tr class="">
                                           <td>{{ $i++ }}</td>
                                           <td>{{ $driver->name }}</td>
                                           <td>{{ $driver->dl_no }}</td>
                                           <td>{{ $driver->mobile }}</td>
                                           <td></td>
                                           <td><img src="{{ asset('public/img/drivers/') }}/{{ $driver->picture }}" alt="" style="width: 75px; height: 75px;"></td>
                                           <td>{{ $driver->roll }}</td>
                                           <td><?php 
                                        $date = date_create($driver->exam_date);
                                        echo date_format($date, 'd-m-Y')
                                        ?></td>
                                           <td class="no-print"><a href="{{ url('/driver-details') }}/{{ $driver->id }}"><i style="font-size: 25px;" class="icon-eye-open no-print"></a></i></td>
                                           <td class="no-print">
                                            
                                          <a class="btn btn-danger" href="{{ url('/driver-exam-unlisted') }}/{{ $driver->id }}">Unlisted</a> ||

                                            <a class="btn btn-primary" href="{{ url('/driver-training-certificate') }}/{{ $driver->id }}">Certificate</a>
                                          </td>
                                       </tr>
                                       @endforeach
                                      @elseif(count($drivers) == 0)
                                         <tr class="aler alert-danger">
                                             <td colspan="9" style="text-align: center;">Driver Not Found!!</td>
                                         </tr>
                                      @endif
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                     <!-- END EXAMPLE TABLE widget-->
                 </div>
             </div>

            <!-- END EDITABLE TABLE widget-->
@endsection