@extends('index')
@section('page_content')
@section('title', 'Driver\'s Details')

<style>
  table tr{font-size: 18px;}
  table tr th{text-align: right !important;}
  table tr td{text-align: left !important;}
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
            <!-- BEGIN EDITABLE TABLE widget-->
             <div class="row-fluid">
                 <div class="span12">
                     <!-- BEGIN EXAMPLE TABLE widget-->
                     <div class="widget green" id="printableArea">
                         <div class="widget-title no-print">
                             <h4><i class="icon-reorder"></i> @yield('title')</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                         </div>
                                 <div class="clearfix no-print">
                                     <div class="btn-group pull-right">
                                         <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                         </button>
                                         <ul class="dropdown-menu pull-right">
                                             <li><a href="" onclick="window.print()">Print</a></li>
                                         </ul>
                                     </div>
                                 </div>
                         <div class="widget-body">
                             <div>
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

                                <!--Office Heading Page added here-->
                                  <div class="office_heading">
                                  <div class="span2">
                                    <div class="brta_logo">
                                      <img src="{{ asset('public/img/brta logo.png') }}" alt="">
                                    </div>
                                  </div>
                                  <div class="span8">
                                      <h2>Bangaldesh Road Transport Authority</h2>
                                      <h3>Professional Driver Training Exam Slip</h3>
                                  </div>
                                  <div class="span2">
                                  </div>
                                </div>

                                  @foreach ($drivers as $driver)
                                 <table class="table table-hover table-bordered">
                                     <thead>
                                     <tr class="no-print">
                                        <td colspan="3" style="text-align: center !important;"><img src="{{ asset('public/img/drivers/') }}/{{ $driver->picture }}" alt="Driver's Photo" style="width:200px; height:200px; padding: 2px; border: 5px solid gray;"></td>
                                     </tr>
                                     <tr>
                                        <th>Name</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ $driver->name }}</td>
                                     </tr>
                                     <tr>
                                        <th>Mobile</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ $driver->mobile }}</td>
                                     </tr>
                                     <tr>
                                        <th>Driving Licence No.</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ $driver->dl_no }}</td>
                                     </tr>
                                     <tr>
                                        <th>Date of Birth</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ $driver->date_of_birth }}</td>
                                     </tr>
                                     <tr>
                                        <th>Driving Licence Type</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>
                                          @if ($driver->dl_type == 'prof')
                                            Professional 
                                          @else
                                            Non-Professional 
                                          @endif
                                        </td>
                                     </tr>
                                     <tr>
                                        <th>Driving Licence Class</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ $driver->dl_class }}</td>
                                     </tr>
                                     <tr>
                                        <th>Driving Licence Issue</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ $driver->dl_issue }}</td>
                                     </tr>
                                     <tr>
                                        <th>Roll No</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ $driver->roll }}</td>
                                     </tr>
                                     <tr>
                                        <th>Exam Date</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td><?php 
                                        $date = date_create($driver->exam_date);
                                        echo date_format($date, 'd-m-Y')
                                        ?></td>
                                     </tr>
                                     <tr>
                                        <th>Slip Issue Date</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td><?php 
                                        $date = date_create($driver->created_at);
                                        echo date_format($date, 'd-m-Y')
                                        ?></td>
                                     </tr>
                                     <tr class="no-print">
                                        <th>Issued By</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td><?php 
                                          $admins = DB::table('admin')
                                          ->where('id', $driver->updator_id)
                                          ->get();
                                        ?>
                                          @foreach ($admins as $adm)
                                            {{ $adm->name }}
                                          @endforeach
                                        </td>
                                     </tr>
                                     {{-- <tr>
                                        <th>Blood</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ $driver->blood }}</td>
                                     </tr>
                                     <tr>
                                        <th>Gender</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ $driver->gender }}</td>
                                     </tr>
                                     <tr>
                                        <th>Father's Name</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ $driver->fathers_name }}</td>
                                     </tr>
                                     <tr>
                                        <th>Mother's Name</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ $driver->mothers_name }}</td>
                                     </tr>
                                     <tr>
                                        <th>Presenet Address</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ $driver->current_addr }}</td>
                                     </tr>
                                     <tr>
                                        <th>Address</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ $driver->permanent_addr }}</td>
                                     </tr>
                                     <tr>
                                        <th>Entry Date</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ $driver->created_at }}</td>
                                     </tr> --}}
                                     </thead>
                                 </table>

                                       @endforeach
                             </div>
                         </div>
                     </div>
                     <!-- END EXAMPLE TABLE widget-->
                 </div>
             </div>

            <!-- END EDITABLE TABLE widget-->






@endsection