@extends('index')
@section('page_content')
@section('title', 'School Request Approve')

            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme Color:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-green" data-style="green"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-red" data-style="red"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     @yield('title') Page
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           @yield('title')
                       </li>
                       <li class="pull-right search-wrap">
                           <form action="http://thevectorlab.net/metrolab/search_result.html" class="hidden-phone">
                               <div class="input-append search-input-area">
                                   <input class="" id="appendedInputButton" type="text">
                                   <button class="btn" type="button"><i class="icon-search"></i> </button>
                               </div>
                           </form>
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
                     <div class="widget purple">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i> @yield('title')</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                         </div>
                         <div class="widget-body">
                             <div>
                                 <div class="clearfix">
                                     <div class="btn-group pull-right">
                                         <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                         </button>
                                         <ul class="dropdown-menu pull-right">
                                             <li><a href="#">Print</a></li>
                                             <li><a href="#">Save as PDF</a></li>
                                             <li><a href="#">Export to Excel</a></li>
                                         </ul>
                                     </div>
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
                                 <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                     <thead>
                                     <tr style="text-align: center;">
                                         <th>SL.</th>
                                         <th>School Name</th>
                                         <th>School Code</th>
                                         <th>School Email</th>
                                         <th>School Phone</th>
                                         <th>School Address</th>
                                         <th>Action</th>
                                     </tr>
                                     </thead>
                                     <tbody>
                                      <?php
                                        $i = 1;
                                      ?>
                                      @if (count($scl_reqs) > 0)
                                        @foreach ($scl_reqs as $scl_req)
                                       <tr class="">
                                           <td>{{ $i++ }}</td>
                                           <td>{{ $scl_req->scl_name }}</td>
                                           <td>{{ $scl_req->scl_code }}</td>
                                           <td>{{ $scl_req->scl_email }}</td>
                                           <td>{{ $scl_req->scl_phone }}</td>
                                           <td>{{ $scl_req->district_name.', '.$scl_req->thana_name.', '.$scl_req->scl_address }}</td>
                                           <td><a class="btn btn-success" href="{{ url('/scl_approve') }}/{{ $scl_req->id }}">Approve</a></td>
                                           <td><a class="btn btn-danger" href="{{ url('/scl_delete') }}/{{ $scl_req->id }}">Delete</a></td>
                                       </tr>
                                       @endforeach
                                      @elseif(count($scl_reqs) == 0)
                                         <tr class="aler alert-danger">
                                             <td colspan="7" style="text-align: center;">There is no School Request now</td>
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