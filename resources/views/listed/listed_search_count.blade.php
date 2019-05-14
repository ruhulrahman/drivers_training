@extends('index')
@section('page_content')
@section('title', 'Listed Driver Search By Date Range')
          
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
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
                <form action="{{ url('/listed-search-count') }}" method="get" class="hidden-phone">
                    {{ csrf_field() }}
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                     <tbody>
                      <tr>
                        <td colspan="2"><h3 class="text-center">Search by Issue Date</h3></td>
                      </tr>
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
                  <h3 class="text-center"><strong>Search Date: <?php 
                                        $date = date_create($start_date);
                                        echo date_format($date, 'd-m-Y')
                                        ?> to <?php 
                                        $date = date_create($end_date);
                                        echo date_format($date, 'd-m-Y')
                                        ?></strong></h3>
                @endif
                <div class="metro-nav">
                    <div class="metro-nav-block nav-block-green">
                        <a data-original-title="" href="{{ url('listed-prof-driver-search') }}/{{ $start_date }}/{{ $end_date }}">
                            <i class="icon-user"></i>
                            <div class="info">
                                {{ count($prof) }}
                            </div>
                            <div class="status">Professinal Drivers</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-green">
                        <a data-original-title="" href="{{ url('listed-nonprof-driver-search') }}/{{ $start_date }}/{{ $end_date }}">
                            <i class="icon-user"></i>
                            <div class="info">
                                {{ count($non_prof) }}
                            </div>
                            <div class="status">Non-Professinal Drivers</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-red">
                        <a data-original-title="" href="{{ url('listed-light-driver-search') }}/{{ $start_date }}/{{ $end_date }}">
                            <i class="icon-user"></i>
                            <div class="info">
                                {{ count($light) }}
                            </div>
                            <div class="status">Light Class Drivers</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-red">
                        <a data-original-title="" href="{{ url('listed-lightmotorcycle-driver-search') }}/{{ $start_date }}/{{ $end_date }}">
                            <i class="icon-user"></i>
                            <div class="info">
                                {{ count($lightmotorcycle) }}
                            </div>
                            <div class="status">Light and Motor Cycle Drivers</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-red">
                        <a data-original-title="" href="{{ url('listed-medium-driver-search') }}/{{ $start_date }}/{{ $end_date }}">
                            <i class="icon-user"></i>
                            <div class="info">
                                {{ count($medium) }}
                            </div>
                            <div class="status">Medium Class Drivers</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-red">
                        <a data-original-title="" href="{{ url('listed-heavy-driver-search') }}/{{ $start_date }}/{{ $end_date }}">
                            <i class="icon-user"></i>
                            <div class="info">
                                {{ count($heavy) }}
                            </div>
                            <div class="status">Heavy Class Drivers</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-red">
                        <a data-original-title="" href="{{ url('listed-psv-driver-search') }}/{{ $start_date }}/{{ $end_date }}">
                            <i class="icon-user"></i>
                            <div class="info">
                                {{ count($psv) }}
                            </div>
                            <div class="status">PSV Class Drivers</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-blue">
                        <a data-original-title="" href="{{ url('listed-new-driver-search') }}/{{ $start_date }}/{{ $end_date }}">
                            <i class="icon-user"></i>
                            <div class="info">
                                {{ count($new) }}
                            </div>
                            <div class="status">New Driving Licence</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-blue">
                        <a data-original-title="" href="{{ url('listed-renew-driver-search') }}/{{ $start_date }}/{{ $end_date }}">
                            <i class="icon-user"></i>
                            <div class="info">
                                {{ count($renew) }}
                            </div>
                            <div class="status">Driving Licence Renew</div>
                        </a>
                    </div>
                <div class="metro-nav">
                    <div class="metro-nav-block nav-block-grey ">
                        <a data-original-title="" href="{{ url('listed-total-driver-search') }}/{{ $start_date }}/{{ $end_date }}">
                            <i class="icon-external-link"></i>
                            <div class="info">                                
                              {{ count($id) }}
                            </div>
                            <div class="status">Total Drivers</div>
                        </a>
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