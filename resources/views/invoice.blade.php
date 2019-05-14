<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Driver's Exam Date Slip</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <style>
		
	p{
		line-height: 3;
	}	
	.header{}
	.header p{
		line-height: 1;
	}
	.header {
		line-height: 1;
	    font-size: 18px;
	    font-weight: 700;
	}
	.footer{
		font-size: 11px;
	}
	.body_top{}
	.body_top p{
		line-height: 3;
	}

	.table{
		font-size: 12px;
	}
	span{
		border-bottom: 1px dotted;
	}
	u{
		text-decoration: none;
		border-bottom: 2px dotted;
	}
	u.dash{
		padding: 0px 17px;
	}
	u.dash-double{
		padding: 0px 140px 0px 20px;
	}
	.exam_color{
		color: blue;
		background:#f2f2f2;
	}
	table td{
		padding: 5px 3px !important;
	}
	
	table th{
		padding: 5px 3px !important;
	}
	.act{}
	.act p{
		line-height: 2.5
	}
</style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body>

	@foreach ($drivers as $driver)

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<br>
				<br>
				<br>
				<header class="header text-center">
						<p>“ছ” ফরম</p>
						<p>[ ১২(৩) ধারা দ্রষ্টব্য ]</p>
						<p>ড্রাইভিং লাইসেন্স নবায়নের জন্য আবেদনের ফরম</p>
				</header>
				<div class="body_top">
					<p  class="text-justify">আমি <u class="dash-double">{{ $driver->name }}</u> পিতা/স্বামীর নাম <u class="dash-double">{{ $driver->fathers_name }}</u> <br>বাসস্থান <u class="dash">{{ $driver->tana_name.", ".$driver->dis_name.", ".$driver->div_name." Division" }}</u> এতদ্বারা আমার ড্রাইভিং লাইসেন্স নবায়নের জন্য আবেদন করিতেছি। ড্রাইভিং লাইসেন্স ও আনুষাঙ্গিক বিবরণ এতদসঙ্গে পেশ করা হইলঃ</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-5">
				<p>(ক) ড্রাইভিং লাইসেন্স নং <u class="dash">{{ $driver->dl_no }}</u></p>
				<p>(খ) ইস্যুর তারিখ <u class="dash">{{ date('d-m-Y', strtotime($driver->dl_issue_date)) }}</u></p>
				<p>(গ) লাইসেন্স কর্তৃপক্ষ যিনি সর্বশেষবার উক্ত ড্রাইভিং
						লাইসেন্স ইস্যু করিয়াছেন <u>{{ $driver->office_name }}</u></p>
				<p>(ঘ) লাইসেন্স কর্তৃপক্ষ যিনি সর্বশেষবার উক্ত ড্রাইভিং
						লাইসেন্স নবায়ন করিয়াছেন <u>{{ $driver->office_name }}</u></p>
				<p>(ঙ) ক্যাটাগরী ও মেয়াদ উত্তীর্ণ হইবার তারিখ 
						আমার বর্তমান ঠিকানা .................................</p>

			</div>
			<div class="col-sm-7">
				<div class="exam_info">
					  <table class="table table-bordered">
					    <tbody class="exam_color">
					      <tr>
					      	<th>পরীক্ষার তারিখ</th>
					      	<td>{{ date('d-m-Y', strtotime($driver->exam_date)) }}</td>
					      </tr>
					      <tr>
					        <th>পরীক্ষার রোল</th>
					        <td>{{ $driver->roll }}</td>
					      </tr>
					      <tr>
					        <th>পরীক্ষার সময়</th>
					        <td>{{ $driver->exam_time }}</td>
					      </tr>
					      <tr>
					        <th>পরীক্ষার স্থান</th>
					        <td>জেয়ার সাহারা, বিআরটিসি বাস ডিপো, খিলক্ষেত, ঢাকা।</td>
					      </tr>
					      <tr>
					        <th>এন্ট্রির তারিখ ও সময়</th>
					        <td>{{ date('d-m-Y', strtotime($driver->created_at)) }}, {{ date('H:m', strtotime($driver->created_at)) }}</td>
					      </tr>
					    </tbody>
					  </table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p>ড্রাইভিং লাইসেন্সে এই ঠিকানা উল্লেখিত না হইলে, আমি চাহি/চাহি না যে তাহা অনুরুপভাবে উল্লেখিত হউক।</p>
				<p>মোটরযান আইন-১১</p>	
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="act">
					<article>
						<p class="text-center"><b>মোটরযান আইন</b></p>
						<p>মেয়াদ উত্তীর্ণ হইবার পনের দিনের মধ্যে লাইসেন্স নবায়ন না করা হইলে বিলম্ব হইবার বিস্তারিত কারণঃ</p>
						<p>কোন লাইসেন্সিং কর্তৃপক্ষ এই লাইসেন্স নবায়ন করিতে অঙ্গীকার করেন নাই।</p>
						<p class="text-justify">আমি এতদ্বারা ঘোষণা করিতেছি যে, আমার এমন কোন রোগ বা শারীরিক দুর্বলতা নাই যাহার দরুন আমি আমার লাইসেন্সে উল্লেখিত শ্রেণীসমক্রেব মোটরগাড়ি চালাইতে গিয়া জনসাধারণ বিপদের সম্মুখীন হইতে পারে। </p>
						<p class="text-justify">নোটঃ পেশাদারি ড্রাইভিং লাইসেন্স নবায়নের আবেদনপত্রের সহিত একটি মেডিকেল সার্টিফিকেট সংযুক্ত থাকিতে হইবে। ‘গ’ ফরমে লিখিত এই মেডিকেল সার্টিফিকেট একজন রেজিস্টার্ড মেডিকেল প্র্যাকটিশনার কর্তৃক স্বাক্ষরিত হইতে হইবে। লাইসেন্সধারী ব্যক্তি কর্মচারী হইলে মেডিকেল সার্টিফিকেট বাবদ খরচ মালিক কর্তৃক (সরকার ও উহার অন্তর্ভূক্ত হইতে পারে)</p>						
					</article>
				</div>
				
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<p>তারিখঃ <u>{{ date('d-m-Y', strtotime($driver->created_at)) }}  </u>  আবেদনকারীর স্বাক্ষর অথবা</p>	
			</div>
			<div class="col-md-6">
				<br>
				<p>বৃদ্ধাঙ্গুলীর ছাপ।</p>
				<p>ঠিকানা........................................................</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<footer class="footer"><p>গভর্নমেন্ট প্রিন্টিং প্রেস-কম্পিউটার শাখ-৯৫৯/২০১৫-২০১৬/(সিঃ)-০৫-০১-২০১৬-২,০০,০০০ কপি।</p></footer>
			</div>
		</div>
	</div>    
  </section>

@endforeach

</body>

</html>