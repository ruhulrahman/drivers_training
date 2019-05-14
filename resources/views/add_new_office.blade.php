@extends('index')
@section('page_content')
@section('title', 'Add New Office')

<?php

?>
<style>

input[type="radio"], input[type="checkbox"] {
    /* margin: 4px 0 0; */
    margin: 0px 0px 0px 15px !important;
    line-height: normal;
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
                           Office Manage
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
                                 <?php
                                    $message = Session::get('message');
                                    $error = Session::get('error');
                                  ?>
                                @if ($message)
                                  <div class="text-center alert alert-success">
                                    {{ $message }}
                                    {{ Session::put('message', null) }}
                                 </div>
                                @endif

                                @if ($error)
                                  <div class="text-center alert alert-success">
                                    {{ $error }}
                                    {{ Session::put('error', null) }}
                                 </div>
                                @endif
            <div id="page-wraper">
                <div class="row-fluid">
                    <div class="span6">
                        <!-- BEGIN BASIC PORTLET-->
                        <div class="widget red">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> @yield('title')</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                            </div>
                            <div class="widget-body">
                              <div class="alert alert-success print-success-msg text-center" style="display: none;"></div>

                              <form action="{{ url('/create-new-office') }}" method="post" id="dm_form">
                                {{ csrf_field() }}
                                <table class="table table-bordered">
                                  <tr>
                                    <td>Office Name</td>
                                    <td>
                                        <input type="text" name="office_name" id="office_name" placeholder="Enter Name" class="input-xlarge" required="required">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Office Code</td>
                                    <td>
                                        <input type="text" name="office_code" id="office_code" placeholder="Enter code" class="input-xlarge" required="required">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Office Adress</td>
                                    <td>
                                        <input type="text" name="office_addr" id="office_addr" placeholder="Enter office address" class="input-xlarge">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Office Email</td>
                                    <td>
                                        <input type="email" name="office_email" id="office_email" placeholder="Enter email" class="input-xlarge">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Office Mobile</td>
                                    <td>
                                        <input type="text" name="office_mobile" id="office_mobile" placeholder="Enter Mobile No. (Exmp: 018********)" class="input-xlarge">
                                      </span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Sumission</td>
                                    <td>
                                        <input type="submit" class="btn btn-primary" value="Add New">
                                </div>
                                    </td>
                                  </tr>
                                </table>

                                </form>
                            </div>
                        </div>
                        <!-- END BASIC PORTLET-->
                    </div>
                    </div>
                </div>

@endsection