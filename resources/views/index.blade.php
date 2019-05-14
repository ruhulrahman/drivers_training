 <!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>BRTA Drivers Training Management</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="Ruhul" name="author" />
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> 


   <link href="{{ asset('public/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
   <link href="{{ asset('public/assets/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet" />
   <link href="{{ asset('public/assets/bootstrap/css/bootstrap-fileupload.css') }}" rel="stylesheet" />
   <link href="{{ asset('public/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
   <link href="{{ asset('public/css/style.css') }}" rel="stylesheet" />
   <link href="{{ asset('public/css/style-responsive.css') }}" rel="stylesheet" />
   <link href="{{ asset('public/css/style-default.css') }}" rel="stylesheet" id="style_color" />
   <link href="{{ asset('public/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css') }}" rel="stylesheet" />
   <link href="{{ asset('public/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen"/>

    <link href="{{ asset('public/assets/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/uniform/css/uniform.default.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/jquery-ui.css') }}" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
   <script src="{{ asset('public/ajax/ajax.js') }}"></script>

   <style>
     @media print {    
          .no-print, .no-print *{
              display: none !important;
          }
          .page-break {
              page-break-before:always;
          }
      }
      .office_heading{
        color: green;
        text-align: center;
      }
      .office_heading{}
      .office_heading img{
        width: 70px;
        height: 70px;
      }
   </style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->

   <div id="header" class="navbar navbar-inverse navbar-fixed-top no-print">
       <!-- BEGIN TOP NAVIGATION BAR -->
       <div class="navbar-inner">
           <div class="container-fluid">
               <!--BEGIN SIDEBAR TOGGLE-->
               <div class="sidebar-toggle-box hidden-phone">
                   <div class="icon-reorder"></div>
               </div>
               <!--END SIDEBAR TOGGLE-->
               <!-- BEGIN LOGO -->
               <a class="brand no-print" href="{{ url('/') }}" style="width: 400px; color: #FFF">
                   Drivers Training Management Application
               </a>
               <!-- END LOGO -->
               <!-- BEGIN RESPONSIVE MENU TOGGLER -->
               <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="arrow"></span>
               </a>
               <!-- END RESPONSIVE MENU TOGGLER -->
               <div id="top_menu" class="nav notify-row">
                   <!-- BEGIN NOTIFICATION -->
                   <ul class="nav top-menu">

                       <!-- END INBOX DROPDOWN -->
                       <!-- BEGIN NOTIFICATION DROPDOWN -->

                       <!-- END NOTIFICATION DROPDOWN -->

                   </ul>
               </div>
               <!-- END  NOTIFICATION -->
               <div class="top-nav ">
                   <ul class="nav pull-right top-menu" >
                       <!-- BEGIN SUPPORT -->

                       <li class="dropdown mtop5">
                           <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Help">
                               <i class="icon-headphones"></i>
                           </a>
                       </li>
                       <!-- END SUPPORT -->
                       <!-- BEGIN USER LOGIN DROPDOWN -->
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <img src="{{ asset('public/img/avatar1_small.jpg') }}" alt="">
                               <span class="username">
                                 <?php
                                  $AdminName = Session::get('AdminName');
                                  if($AdminName){
                                    echo $AdminName;                                    
                                  }
                                ?>
                               </span>
                               <b class="caret"></b>
                           </a>
                           <ul class="dropdown-menu extended logout">
                               <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                               <li><a href="#"><i class="icon-cog"></i> My Settings</a></li>
                               <li><a href="{{ URL::to('/logout-admin') }}"><i class="icon-key"></i> Log Out</a></li>
                           </ul>
                       </li>
                       <!-- END USER LOGIN DROPDOWN -->
                   </ul>
                   <!-- END TOP NAVIGATION MENU -->
               </div>
           </div>
       </div>
       <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar-scroll">
        <div id="sidebar" class="nav-collapse collapse">

         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
               <input type="text" class="search-query" placeholder="Search" />
            </form>
         </div>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
          <ul class="sidebar-menu">
              <li class="sub-menu active">
                  <a class="" href="{{ url('/') }}">
                      <i class="icon-dashboard"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-user"></i>
                      <span>Drivers Management</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="{{ url('/add-new-driver') }}">Add New Driver</a></li>
                      <li><a class="" href="{{ url('/search-driver') }}">Search A Specific Driver</a></li>
                      <li><a class="" href="{{ url('/timing-search-total-list') }}">Search Drivers by Date Range</a></li>
                      <li><a class="" href="{{ url('/timing-search') }}/">Date Range Search for number count</a></li>
                      <li><a class="" href="{{ url('/total-drivers-list') }}/">Total Drivers Lists</a></li>
                  </ul>
              </li>
              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="fas fa-car"></i>
                      <span>Drivers Listing</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="{{ url('/search-listed-driver') }}">Search Listed Driver</a></li>
                      <li><a class="" href="{{ url('/listed-drivers-search-withdate') }}">Search Listed Drivers by Date Range</a></li>
                      <li><a class="" href="{{ url('/listed-search-count') }}/">Date Range Search for Listed number count</a></li>
                      <li><a class="" href="{{ url('/total-listed-drivers') }}/">Total Listed Drivers</a></li>
                  </ul>
              </li>
              <li class="sub-menu">
                  <a href="javascript:;" class="text-primary">
                      <i class="fa fa-eraser" aria-hidden="true"></i>
                      <span>Drivers Unlisting</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="{{ url('/search-unlisted-driver') }}">Search Unlisted Driver</a></li>
                      <li><a class="" href="{{ url('/unlisted-drivers-search-withdate') }}">Search Unlisted Drivers by Date Range</a></li>
                      <li><a class="" href="{{ url('/unlisted-search-count') }}/">Date Range Search for Unlisted number count</a></li>
                      <li><a class="" href="{{ url('/total-unlisted-drivers') }}/">Total Unlisted Drivers</a></li>
                  </ul>
              </li>
              <?php 
                $AdminId = Session::get('AdminId');
                $users = DB::table('admin')->where('id', $AdminId)->get();
              ?>
              @foreach($users as $user)
              @if($user->type == 1)
              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-user"></i>
                      <span>User Manage</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="{{ asset('/add-new-user') }}">Add New User</a></li>
                      <li><a class="" href="{{ asset('/total-users-list') }}/">Users Lists</a></li>
                  </ul>
              </li>
              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-user"></i>
                      <span>Office Manage</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="{{ asset('/add-new-office') }}">Add New Office</a></li>
                      <li><a class="" href="{{ asset('/office-list') }}/">Office Lists</a></li>
                  </ul>
              </li>
              @endif
              @endforeach
              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-user"></i>
                      <span>Location</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="{{ asset('/division-view') }}">Add New Division</a></li>
                      <li><a class="" href="{{ asset('/district-view') }}">Add New District</a></li>
                      <li><a class="" href="{{ asset('/tana-view') }}">Add New Police Station</a></li>
                      <li><a class="" href="{{ asset('/find-place') }}/">Find Location</a></li>
                  </ul>
              </li>
              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-flag"></i>
                      <span>Reports</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="{{ asset('/listed-report') }}">Listed Report</a></li>
                      <li><a class="" href="{{ asset('unlisted-report') }}/">Unlisted Report</a></li>
                      <li><a class="" href="{{ asset('mutual-report') }}/">Total Listed and Unlisted Mutual Report</a></li>
                  </ul>
              </li>
              <li>
                  <a class="" href="{{ url('/logout-admin') }}">
                    <i class="icon-user"></i>
                    <span>Login Page</span>
                  </a>
              </li>
          </ul>
         <!-- END SIDEBAR MENU -->
      </div>
      </div>
      <!-- END SIDEBAR -->





      <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">

            @yield('page_content')

         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  






   </div>
   <!-- END CONTAINER -->

   <!-- BEGIN FOOTER -->
   <div id="footer">
      <div style="max-width: 500px; margin: 0 auto;">
       <p class="pull-left no-print">2018 &copy; BRTA Drivers Training Management System</p>
       <p class="pull-right">Developed by <a href="http://www.facebook.com/Ruhul14.02" target="_blank">Ruhul</a></p>
       </div>
   </div>
   <!-- END FOOTER -->
 

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="{{ asset('public/js/jquery-1.8.3.min.js') }}"></script>
   <script src="{{ asset('public/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
   <script type="text/javascript" src="{{ asset('public/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('public/assets/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
   <script src="{{ asset('public/assets/bootstrap/js/bootstrap.min.js') }}"></script>

   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="public/js/excanvas.js"></script>
   <script src="public/js/respond.js"></script>
   <![endif]-->

   <script src="{{ asset('public/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}" type="text/javascript"></script>
   <script src="{{ asset('public/js/jquery.sparkline.js') }}" type="text/javascript"></script>
   <script src="{{ asset('public/assets/chart-master/Chart.js') }}"></script>

   <!--common script for all pages-->
   <script src="{{ asset('public/js/common-scripts.js') }}"></script>

   <!--script for this page only-->

   <script src="{{ asset('public/js/easy-pie-chart.js') }}"></script>
   <script src="{{ asset('public/js/sparkline-chart.js') }}"></script>
   <script src="{{ asset('public/js/jquery-ui.js') }}"></script>

   <!-- For webcam-->
   
   <script src="{{ asset('public/jpeg_camera/jpeg_camera_with_dependencies.min.js') }}"></script>

   <!--script for this page-->
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="public/js/excanvas.js"></script>
   <script src="public/js/respond.js"></script>
   <![endif]-->

   <!-- END JAVASCRIPTS -->
  <script>
  $( function() {
    var closeText = $( "#datepicker1" ).datepicker( "option", "closeText" )
    $( "#datepicker1" ).datepicker({
      dateFormat:'yy-mm-dd',
      changeYear: true,
      changeMonth: true,
      yearRange: '1930:2050',
    });
    $( "#datepicker2" ).datepicker({
      dateFormat:'yy-mm-dd',
      changeYear: true,
      changeMonth: true,
      yearRange: '1930:2050',
    });
    $( "#datepicker3" ).datepicker({
      dateFormat:'yy-mm-dd',
      changeYear: true,
      changeMonth: true,
      yearRange: '1930:2050',
    });
    $( "#datepicker4" ).datepicker({
      dateFormat:'yy-mm-dd',
      changeYear: true,
      changeMonth: true,
      yearRange: '1930:2050',
    });
  } );
  </script>
   


<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>





   <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

//User registration
            $('#sssp').on('submit', function (e) {
                e.preventDefault();
                data = $(this).serialize();
                url = $(this).attr('action');

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        console.log(data);
                        if ($.isEmptyObject(data.errors)) {
                            console.log(data.success);
                            $('#sssp')[0].reset();
                            $('.text-danger').remove();
                            $('.print-success-msg').html(data.success);
                            $('.print-success-msg').css('display', 'block');
                        } else {
                            printMessageErrors(data.errors);
                        }
                    }
                });
            });



            $('#dm_form').on('submit', function (e) {
                e.preventDefault();
                data = $(this).serialize();
                url = $(this).attr('action');

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        console.log(data);
                        if ($.isEmptyObject(data.errors)) {
                            console.log(data.success);
                            $('#dm_form')[0].reset();
                            $('.text-danger').remove();
                            $('.print-success-msg').html(data.success);
                            $('.print-success-msg').css('display', 'block');
                        } else {
                            printMessageErrors(data.errors);
                        }
                    }
                });
            });



            function printMessageErrors(msg) {
                $('.text-danger').remove();
                $.each(msg, function (key, value) {
                    var element = $('#' + key);
                    element.closest('div.control-group')
                            .addClass(value.length > 0 ? 'has-error' : 'has-success');
                    $('.control-label').css('color', '#000');
                    element.after('<span class="text-danger" style="color:red;"><span class="glyphicon glyphicon-exclamation-sign text-danger"></span> ' + value + '</span>');
                });
            }
        </script>



<!-- For Webcam -->
    <script>
    var options = {
      shutter_ogg_url: "public/jpeg_camera/shutter.ogg",
      shutter_mp3_url: "public/jpeg_camera/shutter.mp3",
      swf_url: "public/jpeg_camera/jpeg_camera.swf",
    };
    var camera = new JpegCamera("#camera", options);
  
  $('#take_snapshots').click(function(){
    var snapshot = camera.capture();
    //snapshot.show();
    
    snapshot.upload({api_url: "action.php"}).done(function(response) {
    $('#imagelist').prepend("<img src='public/img/temp/"+response+"' width='100px' style= 'margin-right: 10px; margin-bottom: 10px;' height='100px'>");
    }).fail(function(response) {
      alert("Upload failed with status " + response);
    });
  })

function done(){
    $('#snapshots').html("uploaded");
}
</script>

<!--These javascript for Datatable---->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#datatable').DataTable({
        dom: 'Brftip',
        buttons: [
            'copy', 'pdf',
        ]
    });
} );
</script>
<!--End of the javascript for Datatable---->

</body>
<!-- END BODY -->
</html>
