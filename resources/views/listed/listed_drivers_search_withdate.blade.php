@extends('index')
@section('page_content')
@section('title', 'Exam Listed Drivers Search')

<style>
  table tr th{text-align: center !important;}
  table tr td{text-align: center !important;}
</style>


            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title no-print">
                     @yield('title') Page
                   </h3>
                   <ul class="breadcrumb no-print">
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
                     <div class="widget green" id="printableArea">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i> @yield('title')</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                         </div>
                         <div class="widget-body">
                             <div>
                                 <div class="clearfix no-print">
                                     <div class="btn-group pull-right">
                                         <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                         </button>
                                         <ul class="dropdown-menu pull-right">
                                             <li><li><a href="" onclick="window.print()">Print</a></li></li>
                                         </ul>
                                     </div>
                                 </div>
                                 <p><!--Date: --> <?php //echo date('d-m-Y', strtotime("-1 days"));?>  <?php //echo date('d-m-Y');?></p>
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
                                
                                <!--Office Heading-->
                                @include('office_heading')

                                <?php
                                    if(isset($_POST['start_date']) && isset($_POST['end_date'])){
                                      $start_date = $_POST['start_date'];
                                      $end_date = $_POST['end_date'];
                                    }
                                ?>

                <form action="{{ url('/listed-drivers-search-withdate') }}" method="post" class="">
                    {{ csrf_field() }}
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                     <tbody>
                      <tr>
                        <td colspan="3"><span style="font-size: 20px; font-weight: 700;">Exam Listed Total Driver Search By Exam Date Range</span></td>
                      </tr>
                       <tr class="">
                           <td>Pick Exam Date: <input type="text" name="exam_date" value="<?php if(isset($exam_date)){ echo $exam_date;}?>" id="datepicker1" required="required" autocomplete="off"></td>
                           <td class="no-print"><input type="submit" value="Show Data" class="btn btn-primary"></td>
                       
                       </tr>
                     </tbody>
                 </table>
                </form>
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
                                      @if (isset($drivers))
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