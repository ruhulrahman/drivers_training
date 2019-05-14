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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

<style>
body {
  background: rgb(204,204,204); 
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);

}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 21cm;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="landscape"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="landscape"] {
  width: 21cm;
  height: 14.8cm;  
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}

.bg{
  width: 100%;
  height: 100%;
  margin: 0 auto;
  position: relative;
  font-size: 30px;  
  font-weight: bold;
}
.bg img{
  width: 100%;
  height: 100%;
}
.driverName {
    position: absolute;
    top: 356px;
    left: 662px;
}
.licence {
    position: absolute;
    top: 415px;
    left: 437px;
}
.unDefine {
    position: absolute;
    top: 473px;
    left: 424px;
}
.date {
    position: absolute;
    top: 473px;
    left: 576px;
}
</style>
</head>
<body>

<page size="A4" layout="landscape">
  @foreach ($drivers as $driver)
        <div class="bg">
          <img src="{{ url('public/img/certi.jpg') }}" alt="">
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
            //$date = date_create($driver->exam_date);
            //echo $date2 = date('Y-m-d', strtotime($date. ' + 1 days'));
            $Date1 = $driver->exam_date;
            $date = new DateTime($Date1);
            $date->modify('+1 day');
            echo $Date2 = $date->format('d-M-Y');
            //echo date_format(date('Y-m-d', strtotime($driver->exam_date. ' + 1 days')), 'd');
            ?>
          </div>
        </div>
      @endforeach
</page>

</body>
</html>