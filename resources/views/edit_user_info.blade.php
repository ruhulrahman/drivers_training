@extends('index')
@section('page_content')
@section('title', 'Edit User Info')

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

                              <form action="{{ url('/udpate-user') }}" method="post" id="">
                                {{ csrf_field() }}
                                @foreach ($users as $user)
                                
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <table class="table table-bordered">
                                  <tr>
                                    <td>Name</td>
                                    <td>
                                        <input type="text" name="name" value="{{ $user->name }}" id="name" placeholder="Enter Name" class="input-xlarge" required="required">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Username</td>
                                    <td>
                                        <input type="text" name="username" value="{{ $user->username }}" id="username" placeholder="Enter username" class="input-xlarge">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Email</td>
                                    <td>
                                        <input type="email" name="email" value="{{ $user->email }}" id="email" placeholder="Enter email" class="input-xlarge">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Mobile No.</td>
                                    <td>
                                        <input type="text" name="mobile" value="{{ $user->mobile }}" id="mobile" placeholder="Enter Mobile No. (Exmp: 018********)" class="input-xlarge">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Add new Password</td>
                                    <td>
                                        <input type="text" name="password" id="password" placeholder="Enter new password" class="input-xlarge">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Type</td>
                                    <td>
                                      @if($user->type == 1)
                                        <input type="radio" checked="checked" name="type" id="type" value="1">Admin
                                        <input type="radio" name="type" id="type" value="2">User
                                      @elseif($user->type == 2)
                                        <input type="radio" name="type" id="type" value="1">Admin
                                        <input type="radio" checked="checked" name="type" id="type" value="2">User
                                      @endif
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Which BRTA Office he will work</td>
                                    <td>                                      
                                        <select name="office_id" id="office_id" class="input-xlarge" required="required">
                                          @foreach($offices as $office)
                                            @if($user->office_id == $office->id)
                                              <option value="{{ $office->id }}" selected="selected">{{ $office->office_name }}</option>
                                            @else
                                              <option value="{{ $office->id }}">{{ $office->office_name }}</option>
                                            @endif
                                          @endforeach
                                        </select>
                                        <span class="help-block">
                                          <strong style="color: red">{{ $errors->first('mobile') }}</strong>
                                        </span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Sumission</td>
                                    <td>
                                        <input type="submit" class="btn btn-primary" value="User Update">
                                </div>
                                    </td>
                                  </tr>
                                </table>
                                @endforeach
                              </form>
                            </div>
                        </div>
                        <!-- END BASIC PORTLET-->
                    </div>
                    </div>
                </div>

@endsection