@extends('index')
@section('page_content')
@section('title', 'Listed Drivers Report')
 <style>
    .widget-title > h4 {
        font-size: 20px;
    }
</style>          
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12 no-print">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <!-- END THEME CUSTOMIZER-->
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
                       <li class="pull-right search-wrap">
                       </li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                
                <div class="span5">
                <form action="{{ url('listed-report') }}" method="get" class="hidden-phone">
                    {{ csrf_field() }}
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                     <tbody>
                       <tr class="">
                           <td>Start Date</td>
                           <td><input type="text" name="start_date" id="datepicker1" required="required" value="<?php if(isset($start_date)){
                            echo $start_date;
                           } ?>" autocomplete="off"></td>
                       </tr>
                       <tr class="">
                           <td>End Date</td>
                           <td><input type="text" name="end_date" id="datepicker2" required="required" value="<?php if(isset($start_date)){
                            echo $end_date;
                           } ?>" autocomplete="off"></td>
                       </tr>
                       <tr class="">
                           <td></td>
                           <td><input type="submit" value="Click Here" class="btn btn-primary"></td>
                       </tr>
                     </tbody>
                 </table>
                </form>
                </div>
            </div>
            <div class="row-fluid">
                <!--BEGIN METRO STATES-->
                @if (isset($drivers))
                    @if(count($drivers) > 0)
                        <?php
                            $id = array();
                            $prof = array();
                            $non_prof = array();
                            $light = array();
                            $lightmotorcycle = array();
                            $medium = array();
                            $heavy = array();
                            $psv = array();
                            $new = array();
                            $renew = array();
                        ?>
                        @foreach ($drivers as $driver)
                            <!--Driving Licence id -->
                            <?php array_push($id, $driver->id); ?>

                            <!--Driving Licence Type -->
                            @if ($driver->dl_type == 'prof')
                                <?php array_push($prof, $driver->dl_type); ?>
                            @else
                                <?php array_push($non_prof, $driver->dl_type); ?>
                            @endif
                            
                            <!--Driving Licence Type -->
                            @if ($driver->dl_class == 'light')
                                <?php array_push($light, $driver->dl_class); ?>
                            @elseif($driver->dl_class == 'lightmotorcycle')
                                <?php array_push($lightmotorcycle, $driver->dl_class); ?>
                            @elseif($driver->dl_class == 'medium')
                                <?php array_push($medium, $driver->dl_class); ?>
                            @elseif($driver->dl_class == 'heavy')
                                <?php array_push($heavy, $driver->dl_class); ?>
                            @elseif($driver->dl_class == 'psv')
                                <?php array_push($psv, $driver->dl_class); ?>
                            @endif

                             <!--Driving Licence Issue -->
                            @if ($driver->dl_issue == 'new')
                                <?php array_push($new, $driver->dl_issue); ?>
                            @else
                                <?php array_push($renew, $driver->dl_issue); ?>
                            @endif


                        @endforeach
                @if ($start_date)

                @endif
                
                  <div class="row-fluid">
                    <div class="span8">
                        <!-- BEGIN BASIC PORTLET-->
                        <div class="widget purple">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> @yield('title')</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                            </div>
                            <div class="widget-body">
                              <div class="clearfix no-print">
                                     <div class="btn-group pull-right">
                                         <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                         </button>
                                         <ul class="dropdown-menu pull-right">
                                             <li><li><a href="" onclick="window.print()">Print</a></li></li>
                                         </ul>
                                     </div>
                                 </div>

                                 @include('office_heading')
                                 <div class="space10"></div>
                                 
                              <?php $i = 1; ?>
                                <table class="table table-bordered">
                                    <h3 class="text-center">
                    <strong>Search Date: <?php 
                                        $date = date_create($start_date);
                                        echo date_format($date, 'd-m-Y')
                                        ?> to <?php 
                                        $date = date_create($end_date);
                                        echo date_format($date, 'd-m-Y')
                                        ?></strong>
                  </h3>
                                     <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>Professinal Drivers</td>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ count($prof) }}</td>
                                     </tr>
                                     <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>Non Professinal Drivers</td>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ count($non_prof) }}</td>
                                     </tr>
                                     <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>Light Class Drivers</td>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ count($light) }}</td>
                                     </tr> 
                                     <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>Light and Motor Cycle Drivers</td>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ count($lightmotorcycle) }}</td>
                                     </tr> 
                                     <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>Medium Class Drivers</td>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ count($medium) }}</td>
                                     </tr> 
                                     <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>Heavy Class Drivers</td>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ count($heavy) }}</td>
                                     </tr>
                                     <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>PSV Class Drivers</td>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ count($psv) }}</td>
                                     </tr>
                                     <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>Heavy Class Drivers</td>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ count($heavy) }}</td>
                                     </tr>
                                     <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>New Driving Licence</td>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ count($new) }}</td>
                                     </tr>
                                     <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>Driving Licence Renew</td>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ count($renew) }}</td>
                                     </tr>
                                     <tr>
                                        <th colspan="2" style="text-align: center;">Total Drivers Report =</th>
                                        <td style="text-align: center !important;"><i class="icon-long-arrow-right"></i></td>
                                        <td>{{ count($id) }}</td>
                                     </tr> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END BASIC PORTLET-->
                    </div>
                </div>

                <div class="space10"></div>
                    @else
                      <h2 class="alert alert-block alert-error fade in">Data not found according to date range!!</h2>
                    @endif
                @endif
                <!--END METRO STATES-->
            </div>

            <!-- END PAGE CONTENT--> 


@endsection