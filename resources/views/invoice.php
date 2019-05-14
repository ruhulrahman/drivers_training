<?php
$driver = "মোঃ রুহুল আমিন চৌধুরী";
$licenceNo = "০১২৩৪৫৬৭৮৯";
$unDefine = "২৫";
$date = "২৬ জানুয়ারী";
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<style type="text/css" media="print">
  body{margin: 0 auto;}
     @media print {    
          .no-print, .no-print *{
              display: none !important;
          }
          .page-break {
              page-break-before:always;
          }
      }
      
    #bg {
      position: absolute; 
      width: 842px !important; 
      height: 596px !important;
      text-align:center;
      color: black;
      font-weight: 700;
      margin-left: 10px;
    }
    #bg img {
      top: 0; 
      left: 0; 
      right: 0; 
      bottom: 0;  
      width: 100%;
      height: 100%;
    }
    .driverName{ position:absolute; top:271px; left:505px; font-weight:bold;}
    .licence{ position:absolute; top:315px; left:330px; font-weight:bold;}
    .unDefine{ position:absolute; top:357px; left:320px; font-weight:bold;}
    .date{ position:absolute; top:357px; left:445px; font-weight:bold;}

    @page Section1 {
    size: 8.27in 11.69in; 
    margin: .5in .5in .5in .5in; 
    mso-header-margin: .5in; 
    mso-footer-margin: .5in; 
    mso-paper-source: 0;
}



div.Section1 {
    page: Section1;
} 
</style>
</head>
<body>

    <div class="Section1">
      <div class="no-print">
        <a href="" onclick="window.print()">Print</a>
      </div>
      @foreach ($drivers as $driver)
        <div id="bg">
          <img src="{{ url('public/img/Untitled-2.png') }}" alt="">
          <div class="driverName">{{ $driver->name }}</div>
          <div class="licence">{{ $driver->dl_no }}</div>
          <div class="unDefine">
            <?php 
            $date = date_create($driver->exam_date);
            echo date_format($date, 'd')
            ?>
          </div>
          <div class="date">
            <?php 
            $date = date_create($driver->exam_date);
            echo date_format($date, 'd-M')
            ?>
          </div>
        </div>
      @endforeach
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>