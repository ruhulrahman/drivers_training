@extends('index')
@section('page_content')
@section('title', 'Division Edit')


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
                           Locatione
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

<!--main content start-->
      <section id="">
          <section class="page-wraper">
              <!-- page start-->
            <div class="row-fluid">
              <div class="span12">                
                <!---------- Menu---------->
                @include('location.menu')
              </div>
            </div>
            <div class="row-fluid">
            <div class="span6">
              <section class="widget red">
                  <div class="widget-title">
                      <h4><i class="icon-reorder"></i> @yield('title')</h4>
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                    </span>
                  </div>

                <div class="widget-body">
                <div class="alert alert-success print-success-msg text-center" style="display: none;"></div>
                    <form id="dm_form" action="{{ url('/division-update') }}" method="post" class="form-inline" role="form">
                      @csrf
                        @foreach ($division as $dvn)
                            <input type="hidden" name="div_id" value="{{ $dvn->id }}">
                        <div class="form-group">
                            <label class="sr-only" for="div_name">Division Name</label>

                              <input type="text" name="div_name" value="{{ $dvn->div_name }}" class="form-control" id="div_name" placeholder="Enter Division Name">
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>

                </div>
              </section>
            </div>

              <div class="span6">
                              <?php
                                $message = Session::get('message');
                              ?>
                            @if ($message)
                              <div class="text-center alert alert-success">
                                {{ $message }}
                                {{ Session::put('message', null) }}
                             </div>
                            @endif
                <section class="widget">
                    <header class="widget-tile">
                        Division List
                    </header>

                  <div class="widget-body">
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th>SL.</th>
                                          <th>Division Name</th>
                                          <th class="center">Action</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                        <?php $i = 1; ?>
                  @foreach ($divisions as $division)
                                      <tr>
                                          <td>{{ $i++ }}</td>
                                          <td>{{ $division->div_name }}</td>
                                          <td>
                                            <a class="btn btn-primary" href="{{ url('/division-edit') }}/{{ $division->id }}">Edit</a> || 
                                            <a class="btn btn-danger" href="{{ url('/division-delete') }}/{{ $division->id }}">Delete</a>
                                          </td>
                                      </tr>
                  @endforeach

                                      </tbody>
                          </table>
                                </div>
                          </div>
                  </div>
                </section>
              </div>
            </div>




              
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->



@endsection