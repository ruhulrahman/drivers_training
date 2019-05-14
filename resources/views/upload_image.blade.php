@extends('index')
@section('page_content')
@section('title', 'Driver Photo Upload')


<style>

input[type="radio"], input[type="checkbox"] {
    /* margin: 4px 0 0; */
    margin: 0px 0px 0px 15px !important;
    line-height: normal;
}


#camera {
  width: 100%;
  height: 350px;
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
                           Drivers Manage
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           @yield('title')
                       </li>
                       <li class="pull-right search-wrap">{{-- 
                           <form action="" class="hidden-phone">
                               <div class="input-append search-input-area">
                                   <input class="" id="appendedInputButton" type="text">
                                   <button class="btn" type="button"><i class="icon-search"></i> </button>
                               </div>
                           </form> --}}
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
                                    $Driver_id = Session::get('Driver_id');
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

                            @foreach ($Image as $img)                            
                              <form action="{{ url('/upload-image') }}" method="post" id=""  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="driver_id" value="<?php if($Driver_id){ echo $Driver_id; } ?>">
                                <table class="table table-bordered">
                                  <tr>
                                    <td>
                                      <input type="hidden" name="image" value="{{ $img->Image }}" id="">
                                      <img src="{{ asset('public/img/temp/') }}/{{ $img->Image }}" width="508px" height="200px" alt="">

                                      <input style="margin-top: 10px;" type="submit" class="btn btn-primary" value="Upload Photo">
                                    </td>
                                  </tr>
                                </table>
                                </form>
                            @endforeach

                            </div>
                        </div>
                        <!-- END BASIC PORTLET-->
                    </div>
                </div>

@endsection