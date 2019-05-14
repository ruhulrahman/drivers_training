@extends('index')
@section('page_content')
@section('title', 'Add Driver Photo')


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
            <div id="page-wraper">
                <div class="row-fluid">
                    <div class="span9">
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

                                <table class="table table-bordered">
                                  <tr>
                                    <td width="300px">Photo Upload
                                      <div id="imagelist"></div><br>
                                    </td>
                                      
                                    <td>
                                      <div class="text-center">
                                          <div id="camera_info"></div>
                                          <div id="camera"></div><br>
                                          <button id="take_snapshots" class="btn btn-success btn-sm">Take Snapshots</button>
                                      </div>
                                    </td>
                                  </tr>

                                </table>
                            </div>
                        </div>
                              
                        <div class="pull-right">
                          <a href="{{ url('/add-new-driver') }}" class="btn btn-primary">NEXT <i class="icon-hand-right"></i></a>
                        </div>
                        <!-- END BASIC PORTLET-->
                    </div>
                </div>

@endsection