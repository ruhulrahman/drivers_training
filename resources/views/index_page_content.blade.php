@extends('index')
@section('page_content')

          <a href="{{ URL::to('/export_pdf') }}">Export PDF</a>
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     Dashboard
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="{{ url('/') }}">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Dashboard
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
                <!--BEGIN METRO STATES-->
                <div class="metro-nav">
                    <div class="metro-nav-block nav-block-green">
                        <a data-original-title="" href="{{ url('total-prof-driver') }}">
                            <i class="icon-user"></i>
                            <div class="info">
                                <?php
                                    echo $count =DB::table('drivers')
                                    ->where('dl_type', 'pro')
                                    ->count();
                                ?>
                            </div>
                            <div class="status">Professinal Drivers</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-green">
                        <a data-original-title="" href="{{ url('total-nonprof-driver') }}">
                            <i class="icon-user"></i>
                            <div class="info">
                                <?php
                                    echo $count =DB::table('drivers')
                                    ->where('dl_type', 'n-pro')
                                    ->count();
                                ?>
                            </div>
                            <div class="status">Non-Professinal Drivers</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-red">
                        <a data-original-title="" href="{{ url('light-class-driver') }}">
                            <i class="icon-user"></i>
                            <div class="info">
                                <?php
                                    echo $count =DB::table('drivers')
                                    ->where('dl_class', 'lt')
                                    ->count();
                                ?>
                            </div>
                            <div class="status">Light Class Drivers</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-red">
                        <a data-original-title="" href="{{ url('light-and-mtrcycle-driver') }}">
                            <i class="icon-user"></i>
                            <div class="info">
                                <?php
                                    echo $count =DB::table('drivers')
                                    ->where('dl_class', 'ltcy')
                                    ->count();
                                ?>
                            </div>
                            <div class="status">Light and Motor Cycle Drivers</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-red">
                        <a data-original-title="" href="{{ url('total-medium-driver') }}">
                            <i class="icon-user"></i>
                            <div class="info">
                                <?php
                                    echo $count =DB::table('drivers')
                                    ->where('dl_class', 'mdm')
                                    ->count();
                                ?>
                            </div>
                            <div class="status">Medium Class Drivers</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-red">
                        <a data-original-title="" href="{{ url('total-heavy-driver') }}">
                            <i class="icon-user"></i>
                            <div class="info">
                                <?php
                                    echo $count =DB::table('drivers')
                                    ->where('dl_class', 'hv')
                                    ->count();
                                ?>
                            </div>
                            <div class="status">Heavy Class Drivers</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-red">
                        <a data-original-title="" href="{{ url('total-psv-driver') }}">
                            <i class="icon-user"></i>
                            <div class="info">
                                <?php
                                    echo $count =DB::table('drivers')
                                    ->where('dl_class', 'psv')
                                    ->count();
                                ?>
                            </div>
                            <div class="status">PSV Class Drivers</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-blue">
                        <a data-original-title="" href="{{ url('total-new-driver') }}">
                            <i class="icon-user"></i>
                            <div class="info">
                                <?php
                                    echo $count =DB::table('drivers')
                                    ->where('dl_issue', 'nw')
                                    ->count();
                                ?>
                            </div>
                            <div class="status">New Driving Licence</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-blue">
                        <a data-original-title="" href="{{ url('total-renew-driver') }}">
                            <i class="icon-user"></i>
                            <div class="info">
                                <?php
                                    echo $count =DB::table('drivers')
                                    ->where('dl_issue', 'rnw')
                                    ->count();
                                ?>
                            </div>
                            <div class="status">Driving Licence Renew</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-green">
                        <a data-original-title="" href="{{ url('total-prof-driver') }}">
                            <i class="icon-male"></i>
                            <div class="info">
                                <?php
                                    echo $count =DB::table('drivers')
                                    ->where('gender', 'm')
                                    ->count();
                                ?>
                            </div>
                            <div class="status">Male Driver</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-green">
                        <a data-original-title="" href="{{ url('total-nonprof-driver') }}">
                            <i class="icon-female"></i>
                            <div class="info">
                                <?php
                                    echo $count =DB::table('drivers')
                                    ->where('gender', 'f')
                                    ->count();
                                ?>
                            </div>
                            <div class="status">Female Driver</div>
                        </a>
                    </div>
                <div class="metro-nav">
                    <div class="metro-nav-block nav-block-grey ">
                        <a data-original-title="" href="{{ url('/total-drivers-list') }}">
                            <i class="icon-external-link"></i>
                            <div class="info">                                
                              <?php
                                    echo $count =DB::table('drivers')
                                    ->count();
                                ?>
                            </div>
                            <div class="status">Total Drivers</div>
                        </a>
                    </div>
                </div>
                <div class="space10"></div>
                <!--END METRO STATES-->
            </div>

            <!-- END PAGE CONTENT--> 


@endsection