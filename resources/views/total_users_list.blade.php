@extends('index')
@section('page_content')
@section('title', 'Total Users Lists')

<style>
  table tr th{text-align: center !important;}
  table tr td{text-align: center !important;}
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
                           Users Manage
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
                                 <div class="clearfix">
                                     <div class="btn-group pull-right">
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
                                <h3 style="text-align: center; color: green">BRTA Driver Training management user list</h3>
                                 <table id="datatable" class="table table-striped table-hover table-bordered" id="editable-sample">
                                     <thead>
                                     <tr style="text-align: center; background: #dddddd">
                                         <th>SL.</th>
                                         <th>Name</th>
                                         <th>Username</th>
                                         <th>Type</th>
                                         <th>Mobile</th>
                                         <th>Office</th>
                                         <th>Photo</th>
                                         <th>Action</th>
                                     </tr>
                                     </thead>
                                     <tbody>
                                      <?php
                                        $i = 1;
                                      ?>
                                      @if (count($users) > 0)
                                        @foreach ($users as $user)
                                       <tr class="">
                                           <td>{{ $i++ }}</td>
                                           <td>{{ $user->name }}</td>
                                           <td>{{ $user->username }}</td>
                                           <td>
                                              @if($user->type==1)
                                                Admin
                                              @else
                                                User
                                              @endif
                                            </td>
                                           <td>{{ $user->mobile }}</td>
                                           <td>{{ $user->office_name }}</td>
                                           <td><img src="{{ asset('public/img/') }}/{{ $user->photo }}" alt="" style="width: 75px; height: 75px;"></td>
                                           <td>
                                            <a class="btn btn-primary" href="{{ url('/edit-user-info') }}/{{ $user->id }}"><i class="icon-pencil"></i></a> ||
                                          <a class="btn btn-danger" href="{{ url('/delete-user-info') }}/{{ $user->id }}"><i class="icon-trash"></i></a></td>
                                       </tr>
                                       @endforeach
                                      @elseif(count($users) == 0)
                                         <tr class="aler alert-danger">
                                             <td colspan="7" style="text-align: center;">There is no user now</td>
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