<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Login Panel</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="{{ asset('public/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
   <link href="{{ asset('public/assets/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet" />
   <link href="{{ asset('public/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
   <link href="{{ asset('public/css/style.css') }}" rel="stylesheet" />
   <link href="{{ asset('public/css/style-responsive.css') }}" rel="stylesheet" />
   <link href="{{ asset('public/css/style-default.css') }}" rel="stylesheet" id="style_color" />

   <style>
     .footer_area{
      display: block;
      position: absolute;
      left: 0px;
      right: 0px;
      bottom: 0;
      background: #4c4c4c;
     }
     .footer_title{
      text-align: center;
     }
     .footer_title p{
      margin-bottom: 0px;
      padding: 8px;
      color: #38bec9;
      font-size: 15px;
     }
     .footer_title p a{
      color: white;
     }

   </style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="lock">
    <div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="center" id="logo" href="index.html">
            
        </a>
        <h1 style="color:#90BB4F; font-weight: 800">BRTA's Drivers Training Management System</h1>
        <h2 style="color:#F5C147">Welcome to Administration Login Panel</h2>
        <h2 style="color:red">                       
          <?php
              $message = Session::get('message');
              if($message){
                echo $message;
                Session::put('message', null);
              }
          ?>
                          
        </h2>
        <!-- END LOGO -->
    </div>
    <div class="login-wrap">
        <div class="metro single-size red">
            <div class="locked">
                <i class="icon-lock"></i>
                <span>Login</span>
            </div>
        </div>


        <form action="{{ url('/admin-login') }}" method="post">
            {{ csrf_field() }}

        <div class="metro double-size green">
            <div class="input-append lock-input">
                <input name="username" type="text" class="" placeholder="Enter username" required="required">
            </div>
        </div>
        <div class="metro double-size yellow">
            <div class="input-append lock-input">
                <input name="password" type="password" class="" placeholder="Enter password" required="required">
            </div>
        </div>
        <div class="metro single-size terques login">
            <button type="submit" class="btn login-btn">
                Login
                <i class=" icon-long-arrow-right"></i>
            </button>
        </div>

        </form>

    </div>
    <footer class="footer_area">
      <div class="container">
        <div class="row">
          <div class="footer_title">
            <p>Software Developed By <a href="http://www.facebook.com/Ruhul14.02" target="_blank">Ruhul Amin</a></p>
          </div>
        </div>
      </div>
    </footer>
</body>
<!-- END BODY -->
</html>