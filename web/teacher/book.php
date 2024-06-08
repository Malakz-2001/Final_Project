<?php include 'header2.php';?>





<?php include 'includes/dbcon.php';?>
	 
	 	<?php include 'navbar.php';?>
	<?php //include 'menu-tab.php';?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>

	 
	 <script language="javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#datetimeis').attr('min',today);
	
	
	
	
	
	var today = new Date();
var lastMonth = new Date().getMonth() - 1;

var picker = new Pikaday({
  field: document.getElementById('datepicker'),
  maxDate: today,  // maximum/latest date set to today
  // demo only
  position: 'top left',
  reposition: false
});





</script>

	 <script>
 
 
 function handler(e){
  //alert(e.target.value);
 
  
 location.href = "book.php?a="+<?php  echo $_GET['a'];?>+"&b="+<?php echo $_GET['b']; ?>+"&d="+e.target.value;
  
}



 function countdown( elementName, minutes, seconds )
{
    var element, endTime, hours, mins, msLeft, time;

    function twoDigits( n )
    {
        return (n <= 9 ? "0" + n : n);
    }

    function updateTimer()
    {
        msLeft = endTime - (+new Date);
        if ( msLeft < 1000 ) {
            element.innerHTML = "Time is up!";
			//hide paybtn
			var link = document.getElementById('paybtn');
            link.style.display = 'none';
        } else {
            time = new Date( msLeft );
            hours = time.getUTCHours();
            mins = time.getUTCMinutes();
            element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
            setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
        }
    }

    element = document.getElementById( elementName );
    endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
    updateTimer();
}



 </script>
 
 
 



<?php
date_default_timezone_set('Asia/Muscat');

///a horse 

/// b res
ini_set('memory_limit','2048M');


if(isset($_GET['a']) and isset($_GET['b'])){
$room_id = htmlspecialchars($_GET['a'], ENT_QUOTES, 'UTF-8');

$res_id = htmlspecialchars($_GET['b'], ENT_QUOTES, 'UTF-8'); 



	
	
	
}else{
	
	exit();
}










//// get all data 

/// payment 1 - visa pending booking 
/// 2 cash auto 
/// 3 both and auto 




$get_room="SELECT * FROM `rooms` WHERE `room_id` ='$room_id'  and `res_id` ='$res_id' ";
$room_res=mysqli_query($con,$get_room);
$test=mysqli_num_rows($room_res);


// echo "$test <br>";


// echo "hi";


// //get res 

// echo "hi21";

// $get_res="SELECT * FROM `restorants` WHERE `id` ='$res_id'";

// echo "hi3";


// $res_res=mysqli_query($con2,$get_res);


// echo "hi2";

/*
$get_time="SELECT * FROM `hours` WHERE `restorant_id` ='$res_id'";
$time_res=mysqli_query($con2,$get_time);

*/



if(!empty($test)){
	
	// do other connection 
	

	

	
	//$res_data=mysqli_fetch_array($res_res);
	
	//$res_times=mysqli_fetch_array($time_res);
	
    $room_data=mysqli_fetch_array($room_res);
	
	$duration_is=0;
	
	$duration_is = $room_data['duration'];
	$payment_type = $room_data['payment'];
	$price = $room_data['room_price'];
	$cat_is=$room_data['cat_id'];
	if(empty($duration_is)){
		
		
		$duration_is=30;
		
		
		//echo "hi";
		
		
		
	}
	
	$get_date_for_now = date("Y-m-d");
	
	
	
	
	//////////////////////////////الدالة العظيمة لتصفير البندنج بعد 10 د
	
	
	
	$remove_pending="SELECT * FROM `reservation` WHERE `res_id` ='$res_id' and `r_status` ='pending'";
	$pending_res=mysqli_query($con,$remove_pending);
	
	while($pen=mysqli_fetch_array($pending_res)){
		
		$pen_id=$pen['rid'];
		$check_time=$pen['created_at'];


$date = new DateTime("$check_time +00:00");
$date->setTimezone(new DateTimeZone('Asia/Dubai')); // +04

$check_time=$date->format('Y-m-d H:i:s'); 


//echo "$check_time";


		$time_is_now=date('H:i:s');
        $date3 = "$get_date_for_now $time_is_now";
		
$from_time = strtotime($check_time);
 $to_time= strtotime($date3);
$differnet=round(abs($from_time - $to_time) / 60,2);

		
	//	echo "$differnet -> $check_time -    $date3";
		
		
		if($differnet > 10){
			
			//del
			
			$del1="DELETE FROM `reservation` WHERE `rid` = '$pen_id' ";
			$del2="DELETE FROM `reservation_support` WHERE `reservation_id` = '$pen_id'";
			
	 	 mysqli_query($con,$del1);
		 mysqli_query($con,$del2);
			
			
		}
		
		
	}
	
	
	
}else{
	

	exit();
	
	
}





?>



<body>

	
	
		
	
		
	
		<div class="container-fluid">
		
<a  href="index.php?b=<?= $res_id; ?>">
	 <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-box-arrow-left text-dark" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg>

</a>

		
		
		
		<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php    echo "images/$room_data[6]";	  ?>" alt="" width="1100" height="500" style="width:100%;height:300px;">
      <div class="carousel-caption">
        <h3><?php  echo $room_data['room_name'];  ?></h3>
        <p><?php    // echo $res_data['name'];	  echo $room_data['room_name'];	  ?></p>
      </div>   
    </div>
   

  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>		
					
			



		
	<?php
		
		
		
		/*
		//// res data 
		$get_info="SELECT * FROM `restorants` WHERE `id` ='$res_id'";
		
		$info_res=mysqli_query($con2,$get_info);
		$info_data=mysqli_fetch_array($info_res);
		$title_is=$info_data['name'];
		$des_is=$info_data['description'];
		*/
		
		
		
		
	   ///timing 
	  
	//    $get_time="SELECT * FROM `hours` WHERE `restorant_id` = '$res_id'";
	//    $time_res=mysqli_query($con2,$get_time);
	//    $time_data=mysqli_fetch_array($time_res);
		

	 
	   
	///$date_now=date("Y-m-d");
	
	
	if(empty($_GET['d'])){
		
		
		$get_date = date("Y-m-d");
	}
else{
	
		$get_date = htmlspecialchars($_GET['d'], ENT_QUOTES, 'UTF-8');
	
}
	$date_now=$get_date;
	
	
	//// DATE CHECK IF CHANGE 
	
	
	$time_select = strtotime($get_date);
	
	$time_now = strtotime(date("Y-m-d"));
	
	//// if anyone play in the date above exit 
	
	if($time_select <	$time_now){
		
		
		exit();
		
		
	}
	
	
	
	$timestamp = strtotime($date_now);

    $day = date('N', $timestamp);
	
	
   // echo $day."<br>";
	
	switch($day){
		
		case 1 :
		$check_date = 0;
		
		break;
		
		case 2 :
		$check_date = 1;
		
		break;
		
	    case 3 :
		$check_date = 2;
		
		break;
		
		case 4 :
		$check_date = 3;
		
		break;
		
		case 5 :
		$check_date = 4;
		
		break;
		
		case 6 :
		$check_date = 5;
		
		break;
		
		case 7 :
		
		$check_date = 6;
		
		break;
		
		
	}
	
	
	//echo "$check_date";
	
	
	   
    $time_is="8:00 AM - 4:00 PM";

		
		?>
							
					
							
						
							
							


	<hr>
					


	
	
		<div class="row align-self-center">

 <div class="col text-center">
  <input type="date" id="datetimeis" onchange="handler(event);" style="width:170px;border-radius: 25px;" 
  class="form-control form-control-lg"
  name="datetimeis"
  min="<?= date("Y-m-d");?>"
  
  
  value="<?php
///2018-06-12T19:30  2022-10-15




echo $get_date;








  ?>"
  
  > 
  
  

  
  <hr>
  
  <br>

</div>

</div>
	

	<!--- categories here --->
	
	
	
	<div class="row">
	
<div class="col-lg-12">  
	<div class="scrollmenu">
	
	
	<?php
	
	
			///هنا نفحص اذا مفعل الشفت الثاني الحبيب 
		
		
		///هنا نكون اسم حقل hour 
		
		///الشفت 2 
		$name_second_from="2_".$check_date."_from";
		$name_second_to="2_".$check_date."_to";
		
		////الشفت الاول
		
		$time_is="8:00 AM - 4:00 PM";
		$name_first_from="8:00 AM";
		$name_first_to="4:00 PM";
		
		
		
		
		$first_start="8:00 AM";
		$first_end="4:00 PM";
			
		$second_start=$time_data["$name_second_from"];
		$second_end=$time_data["$name_second_to"];
			
		

if(isset($time_data["$name_second_from"])){

		//echo '<a class="btn btn-light rounded-pill text-dark" href="#1"><strong>Morning '.$first_start.' - '.$first_end.'</strong></a> ';
		
		//echo '<a class="btn btn-light rounded-pill text-dark" href="#2"><strong>Evening  '.$second_start.' - '.$second_end.'</strong></a> ';
		
		$time_print = 2;  ///للشفتين
		
		
}else{
	
	
   	$time_print = 1;  ///للشفتين
	
	
	
	//	echo '<a class="btn btn-success rounded-pill" href="#1">#1</a> ';
	
			//echo '<a class="btn btn-light rounded-pill text-dark" href="#1"><strong>Timing '.$first_start.' - '.$first_end.'</strong></a> ';
			
			
	
}
		
	
	

	
	
	
	
	?>
	
	


  
</div>
	
	</div>
	
	</div>

	
	

	
	


<?php


	///// set all value for 2 shift 
	
	//// تجهيز المتغيرات للشفين 
	
	
	///$time_print  -> هي الحد الفاصل 
	
	
		$active_period =array();
	
	
	for($looping=1;$looping <= $time_print; $looping++) {
		
		if($looping == 2){
		
		//بيانات الشفت الثاني
		
		$first_start = $second_start;
		$first_end = $second_end;
		
		
		
	}
	
	echo '  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
  <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
  <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
  <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
</svg>';
		echo " $first_start - $first_end ";
		
	
		
		
		
		echo '<div class="row">
	
  <div class="col-lg-12 ">  <div class="scrollmenu22">';
		
		
		
	

		
		echo "<br>";
		
   
		
		
		
		
		//// loop design 
		
	
		
		
		
	        if(isset($first_start)){
			
			echo '<a id="'.$looping.'"></a>';
				
			
			
			//echo "<br>period 1 <hr>";
			
			$i=1;
			$time="";
			$hour=$duration_is;
			//$duration_is=30;
			
			
			
			
				//echo "$first_start <hr>";
				
			
				//$enable_other_day_mode=false;
				
				
				
				
			
				$stop="";
		While($hour >= $duration_is ){
			
			
			//echo "$hour - $duration_is";
			
			
			
			
		
	
			///////نصف ساعة 30
			////ساعة 60
			
			$timestamp = strtotime($first_start) + $duration_is*60*$i;

           $time = date('h:i A', $timestamp);
		   
		   
		   $timestamp2 = strtotime($time) - $duration_is*60;
		   $time_min_1 = date('h:i A', $timestamp2);





            
           
        //   echo $time."<br>";//11:09
		
		
	
		
		
		
		
		
		
		$show_time = $time_min_1." - ".$time;
		



//1 gray time is end 
//2 time is booking 
// 3 read to book 

// time هو مربط الفرس 

//echo "$time";





$date1 = "$date_now $time";
$date2 = "$date_now $first_end";
$time_is_now=date('h:i A');
$date3 = "$date_now $time_is_now";


//echo "$time_is_now";



$timestamp1 = strtotime($date1); /// الوقت المطبوع 
$timestamp2 = strtotime($date2); /// وقت الاغلاق
$timestamp3 = strtotime($date3);






$mode=0;






/// time finish 




//echo $date1 ." ". $date3;
//echo " ".$timestamp1 ." ".$timestamp3;


///30 for 30 min

$hour1 = ($timestamp1  - $timestamp3) /($duration_is*60);


//// هنا يقع الحل 


if (strpos($time, 'AM') !== false AND strpos($time_min_1, 'PM')!== false) {



//$hour1 = ($timestamp3  - $timestamp1) /($duration_is*60);


//$enable_other_day_mode=true;

//echo $time;


//echo "here";
if(strpos($first_end, 'PM')!== false OR strpos($second_end, 'PM')!== false ){
    
    
    break;
    
}
if(strpos($time, '12:00 AM')!== false){
	
	/// true
	
//echo "ok";
///	echo $time;
    //break;
    
    $stop="close";
       // echo "ok";
        
       // echo $Stop;
}else{
	
//	echo "NO";
break;
}
}


if($enable_other_day_mode){
	
	//$hour1 = ($timestamp3  - $timestamp1) /($duration_is*60);
	
	
	/// this to avoid disable 12 am 1am بعد منتصف الليل
	//$enable_other_day_mode=true; 
	
}

$minutes = $hour1 * 60;



//echo "$minutes";

/// time book

   
		
		
	$geter=$date_now.$show_time."##".$room_id;
	$r_code=str_replace(' ', '',$geter);
	$check_period="SELECT * FROM `reservation` WHERE `r_code` like '%$r_code%' and `r_status` ='Approved' ";
	$first_res=mysqli_query($con,$check_period);
	 
			 
	$check_period2="SELECT * FROM `reservation_support` WHERE `r_code` like '%$r_code%' and `r_state` ='Approved' ";
	$second_res=mysqli_query($con,$check_period2);
			 
			 
	$count1=mysqli_num_rows($first_res);
	$count2=mysqli_num_rows($second_res);
			 
			 
			// echo "hi";
			
			
			
			
	$check_period3="SELECT * FROM `reservation` WHERE `r_code` like '%$r_code%' and `r_status` ='pending' ";
	$first_res2=mysqli_query($con,$check_period3);
	 
			 
	$check_period4="SELECT * FROM `reservation_support` WHERE `r_code` like '%$r_code%' and `r_state` ='pending' ";
	$second_res2=mysqli_query($con,$check_period4);
			 
			 
	$count3=mysqli_num_rows($first_res2);
	$count4=mysqli_num_rows($second_res2);
			 
		 
	if($count1 > 0  or $count2 > 0 ){
				 
				 $mode =2;
				 
				 
	}
	
	
		if($count3 > 0  or $count4 > 0 ){
				 
				 $mode =3;
				 
				 
	}
	
if(date("Y-m-d") == $date_now and $minutes < $duration_is ){
	
	$mode = 1;
	
}
if($mode == 1){
	
		echo "<a class='btn text-dark border' title='Ends'  style='width: 180px !important;margin-bottom: 2px !important;'disabled>$show_time</a> ";
}




elseif($mode == 2){
	
			echo "
	<a class='btn btn-danger  border' title='Booked' style='width: 180px !important;margin-bottom: 2px !important;' >$show_time</a>";
}

elseif($mode == 3){
	
			echo "
	<a class='btn btn-warning text-dark  border ' title='Pending' style='width: 180px !important;margin-bottom: 2px !important;' >$show_time</a>";
}

//ready 
else{
	
	//$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



    $encode_show_time=base64_encode($show_time);
	$link="book.php?a=$room_id&b=$res_id&d=".$date_now."&p=".$encode_show_time."&s=".$looping."";
	
	
	 ////تحفظ عشان نشيك
	 array_push($active_period, $encode_show_time);
	 
	 
	 
	// echo "$encode_show_time";
	 
	 
	 
	// echo "yes";
	 
	
	 
	echo "
	<a href='$link' class='btn  btn-success border ' title='Available' style='width: 180px !important;margin-bottom: 2px !important;' >$show_time</a>";
}




         
		   


        
		   

///هنا يحسب الفرق بساعات  عشان يعطل  اللوب

$next_i = $i + 1;

//$hour = abs($timestamp2 - $timestamp1)/($duration_is*60*$i);

///$hour = abs($timestamp2 - $timestamp1)/($duration_is*60*$i);

//$to_time = strtotime("2008-12-13 10:42:00");
//$from_time = strtotime("2008-12-13 10:21:00");

$count_me = 60 * $i;
$hour = round(abs($timestamp2 - $timestamp1) / $count_me,2);


//echo "$hour ";




//$hour = $hour * 60; 

//echo "$hour ";


  $hour = $hour * 60;

//$hour - $duration_is;


/////// هنا نطلعه من اللوب لو وقت الاغلاق اقل من يوم بس ننهي اليوم 
////عن طريق حسابة الفرق بين الوقت المطبوع ووقت الاغلاق
/// ونزيد على المطبوع المدة عشان نعرف لو ما نطبع مره ثانية 


	$timestamp_next = $timestamp1 + $duration_is*60*$i;
	
	$print_done = ($timestamp_next - $timestamp2 )/($duration_is*60);
    
	





/////////////////////////////////////////////




//$date1 = "$date_now $time";
//$date2 = "$date_now $first_end";

//$different = $date2 - $date1;

/*
$timestamp1 = strtotime($date1); /// الوقت المطبوع 
$timestamp2 = strtotime($date2); /// وقت الاغلاق
$timestamp3 = strtotime($date3);
*/



	
	if($stop){
    
  // echo "heelo";
    
    break;
}
//echo $hour."-".$duration_is;




			$i ++;
		


		

	
			
		}

	
 
			
			
		}
		
		
		
		//// for second time 
		
		echo '
</div>
	
	</div>
	
	</div>
	';
	
		echo "<br>";
		
			
	
	}
	
	
	if($time_print == 1){
		
	
		echo '<hr>';
		
	}
	



?>






	
	
	
	










	<!--- Room and iteam print --->

    <div id="products" class="row view-group">
	
	
	
	
	
	<?php        






     $get_all_item="SELECT * FROM `rooms` WHERE `res_id` = '$res_id' order by cat_id desc ";

     $item_res=mysqli_query($con,$get_all_item);
	 
	 $cats_ids =array();
	
	while($itemdata=mysqli_fetch_array($item_res)){
		
		
		
		
	


////// echo herf link for category 

if(!in_array($itemdata['cat_id'], $cats_ids)){
	
echo '<a id="'.$itemdata['cat_id'].'"></a>';


/// fill thaat array 

array_push($cats_ids, $itemdata[0] ,$itemdata['cat_id']);



}




		
		
		
		
		
	}
	








	?>
               
			  
			  
			  
			  
            </div>
	
	
	
	
	<br>
	<br>
	
<div class="modal fade" id="bookingmod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Booking Screen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
	  
	  
	  /// check peroid 

      

	
	if(isset($_GET['p'])){
	echo "
  <script>
    $('#bookingmod').modal('show');
  </script>
";

	}

	
	
     
	 
	 
	 
	  
	  
	  if(in_array($_GET['p'],$active_period) or isset($_SESSION['id'])){
		  
		  
		  
		/// do other thnigs 
		
	$booking_period=$_GET['p'];
	$period_iss=base64_decode($_GET['p']);
	$period = htmlspecialchars($period_iss, ENT_QUOTES, 'UTF-8'); 
	
	
		
		
		  
	  }else{
		  
		  
		 // echo "hi";
		  
		//  print_r($active_period);
		  
	 					 	  
		  echo "<br><div class='alert alert-danger' role='alert'>
Sorry, This period or trainer becomes unavailable please choose different one.
<hr>

<a href='#' onclick='history.go(-1);return false;'>[Go Back]</a>


</div> <br>";
		  
	exit();

		  
	  }
	  
	  

	  
	  ?>
	  
	  
	  <form action="" id="myForm" method="post">





   <div class="form-group">
   
   <?php
   
   
     ////// here post for booking 
	  if(!empty($_POST['full_name']) and isset($_POST['terms']) ){
		  
		  


		

		  
		  ///CHECK INPUT 
		  
		  $full_name = htmlspecialchars($_POST['full_name'], ENT_QUOTES, 'UTF-8');
		  $mobile = htmlspecialchars($_POST['phone_number'], ENT_QUOTES, 'UTF-8');
		  $email_address =$_SESSION["Authlog"];
		  $period_set = htmlspecialchars($_POST['periods'], ENT_QUOTES, 'UTF-8');
		  $trainer_set = htmlspecialchars($_POST['trainer'], ENT_QUOTES, 'UTF-8');
          $passed_array = unserialize($_POST['arry_sent']);
		  $fromto_array = unserialize($_POST['arry_sent2']);
		  $allqr_array = unserialize($_POST['arry_sent3']);
		  


		  /// Name 
		 if(!preg_match('/^[\p{Arabic}a-zA-Z -]+\h?[\p{Arabic}a-zA-Z -]*$/u', $full_name) or strlen($full_name) > 50 or strlen($full_name) < 6 ){
			 
			 
			 		  
		  echo "<br><div class='alert alert-danger' role='alert'>
Enter your full name in arabic or english within 50 letters only.
<a href='#' onclick='history.go(-1);return false;'>[Go Back]</a>


</div> <br>";






die();
			 
		 } 
		 
		 
		 
		 /// Mobile 
		  
		  
		  	 elseif(!is_numeric($mobile) or strlen($mobile) > 8  or strlen($mobile) < 8){
			 
			 
			 		  
		  echo "<br><div class='alert alert-danger' role='alert'>
Enter your omani mobile number without the country code e.g. 91234567.
<a href='#' onclick='history.go(-1);return false;'>[Go Back]</a>


</div> <br>";






die();
			 
		 } 
		  
		  
		  
		
	
	
		elseif(strlen($email_address) < 1 or !preg_match( "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/",strtolower($email_address))){
			 
	  
		  echo "<br><div class='alert alert-danger' role='alert'>
Enter correct email format.
<a href='#' onclick='history.go(-1);return false;'>[Go Back]</a>


</div> <br>";



die();


			}





			 
		  
		  
		
		  
		  
		  
		 ////// here to check duration if valid 
		 
		 
		 else{
			 
			 
			 
			 /// check if the period still active 
			 
			 /// if it's in the main
			 


		

			 
			 $geter=$date_now.base64_decode($booking_period)."##".$room_id.$trainer_set;
			  
			 $r_code=str_replace(' ', '',$geter);
		
			 $check_period="SELECT * FROM `reservation` WHERE `r_code` = '$r_code'  ";
			 $first_res=mysqli_query($con,$check_period);
			 
			 
			 
			 $check_period2="SELECT * FROM `reservation_support` WHERE `r_code` = '$r_code'";
			 $second_res=mysqli_query($con,$check_period2);
			 
			 
			 $none=base64_decode($booking_period);
			 
			 
			 $check_trainer="SELECT * FROM `reservation` WHERE `date_reserved` = '$date_now' and `trainers_id` ='$trainer_set' and `note` = '$none'";
			 $check_res=mysqli_query($con,$check_trainer);
			 
			 
			 $count1=mysqli_num_rows($first_res);
			 $count2=mysqli_num_rows($second_res);
			 $trainer_count=mysqli_num_rows($check_res);
			 
			 
			 
			// echo "hi";
			 
		
			 
			 if(empty($count1)){
				 
				 
				 ///سويله الحجز
				 // وضع الحجز يعتمد على وضع الpayment 
				 //	$payment_type
				 
				//echo " $payment_type ";
				
/// payment 1 - visa pending booking 
/// 2 cash auto 
/// 3 both and auto 


				switch($payment_type){
					
					case 1 :
				     $r_state = "pending";
					break;
					 
					case 2 :
					 $r_state = "Approved";
					break;
					
					case 3 :
					$r_state = "Approved";
					break;
					
					case 0 :
					$r_state = "Approved";
					
					break;
					
					
					
					
				}
				
				
			

				$period_msg= $passed_array[$period_set -1];
				//// sql resrvation 
				
				
								
		        $get_time_show = $fromto_array[$period_set - 1];
				$final_price = $price * $period_set;
				
				////for cash and bank 
				






				if($r_state == "Approved" ){
					
					// r time first start 
					
					
					
					
					$make="INSERT INTO `reservation`(`r_time`, `full_name`, `mobile`, `r_email`, `r_address`, `r_type`, `team_id`, `payable`, `balance`, `r_status`, `date_reserved`, `r_code`, `note`, `price`, `modeofpayment`, `res_id`, `duration`, `info`, `room_id`, `trainers_id`) VALUES 
					('$period','$full_name','$mobile','$email_address','$cat_is','','','','','$r_state','$date_now','$r_code','$period','$final_price','$payment_type','$res_id','$period_set','$period_msg','$room_id','0')";
					
					
					//$make_res=mysqli_query($con,$make);
					



			


					
					if($period_set <= 1){
						
						/// check firest if check done 
						
						
						
					


// error_reporting(E_ALL); // Report all types of errors
// ini_set('display_errors', 1); // Display errors on screen

						  if (mysqli_query($con,$make)) {

                          $last_id = $con->insert_id;
              


			   
			   
			   //// echo msg 
			   
			   
			   	  echo "<br><div class='alert' role='alert'>
<span class='text-success'><b>Booking has been successfully confirmed.</b> </span><br>
Your Booking ID: <b><span class='text-success'>PT-$last_id </span></b> <br>
The details: <br>
You book with, <b>".$room_data['room_name']. "</b><br> at <b>$date_now</b>.<br>
Time: <b>$period</b>.

<hr>

</div>";


$room_name = $room_data['room_name'];
$res_name=$res_data['name'];
$lat_lng=$res_data['lat'].",".$res_data['lng'];
$location="http://www.google.com/maps/place/".$lat_lng;
$msg_wats="Hi, I book $room_name at $date_now.
Time: $period.
Place: $res_name.

$location
Thanks for using our booking system.

";



$url=urlencode("$msg_wats");

echo "

<br>

<a href='index.php?b=$res_id' >[Go Home]</a>


";

///SEND EMAIL 


$mail_To = $email_address;
$mail_Subject = "$res_name Booking Details.";
//start $headers
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n"; //adds content type to headers
//$headers .= $mail_From . "\r\n"; //adds the sender details
mail($mail_To,$mail_Subject,$msg_email,$headers); //sends the email44






			   
			    //// can here print bank account whtsapp msg 
				
			   
			   //// can here print bank account 
			   
			   
			   exit();
			   
			   
			   
			   
                }else{
					
					



					/// error 
									 	  
		  echo "<br><div class='alert alert-danger' role='alert'>
Sorry, This period or trainer becomes unavailable please choose different.
<hr>

<a href='#' onclick='history.go(-1);return false;'>[Go Back]</a>


</div> <br>";


//echo mysqli_error($con);

exit();

					
				}
				
				
						
					
						
						
						/// incert 
						
						
						
					}  else {
						
						
						$get_time_show = $fromto_array[$period_set - 1];
								$make="INSERT INTO `reservation`(`r_time`, `full_name`, `mobile`, `r_email`, `r_address`, `r_type`, `team_id`, `payable`, `balance`, `r_status`, `date_reserved`, `r_code`, `note`, `price`, `modeofpayment`, `res_id`, `duration`, `info`, `room_id`, `trainers_id`) VALUES 
					('$period','$full_name','$mobile','$email_address','$cat_is','','','','','$r_state','$date_now','$r_code','$get_time_show','$final_price','$payment_type','$res_id','$period_set','$period_msg','$room_id','0')";
					
					
						
						  if(mysqli_query($con,$make)){ 
                          $last_id = $con->insert_id;
						  }
			   //$geter=$date_now.$booking_period;
			   //$r_code2=str_replace(' ', '',$geter);
			   
			   
			   
			   for($n=1;$n <= $period_set - 1;$n++){
				   
				   $r_code2=$allqr_array[$n];
				   
			   $periods_add="INSERT INTO `reservation_support`(`reservation_id`, `r_code`, `r_state`) VALUES
						('$last_id','$r_code2','$r_state')";
						
						
						 mysqli_query($con,$periods_add);
						 
						 
						
			   }	
						
			   //// echo msg 
			   
			   
			   			   	  echo "<br><div class='alert' role='alert'>
<span class='text-success'><b>Reservation has been successfully confirmed. </b></span><br>
Your Booking ID: <b><span class='text-success'>PT-$last_id </span></b> <br>
The details: <br>
You book, <b>".$room_data['room_name']. "</b> 
<br>
Trainer, <b>".$_POST['trainer_name']. "</b><br>
at <b>$date_now</b>. <br>For: <b>$period_msg</b>.<br>
Time: <b>$get_time_show</b>.
<hr>

</div>";


$room_name = $room_data['room_name'];
$res_name=$res_data['name'];
$lat_lng=$res_data['lat'].",".$res_data['lng'];
$location="http://www.google.com/maps/place/".$lat_lng;

$msg_wats="Hi, I book $room_name at $date_now. For: $period_msg.
Time: $get_time_show.
Place: $res_name.

$location
Thanks for using our system.

";


$msg_email="<h3>Hi $full_name, <br>
This is your booking details: <br>
Your Booking ID: B-$last_id  <br>
You book, <b>".$room_data['room_name']. "</b> <br> at <b>$date_now</b>. <br>For: <b>$period_msg</b>.<br>
Time: <b>$get_time_show</b>.<br>
Place:".$res_data['name']."<br>
$location
<hr>

Thanks for using our system.
</h3>
";


$url=urlencode("$msg_wats");


///SEND EMAIL 


$mail_To = $email_address;
$mail_Subject = "$res_name Booking Details.";
//start $headers
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n"; //adds content type to headers
//$headers .= $mail_From . "\r\n"; //adds the sender details
mail($mail_To,$mail_Subject,$msg_email,$headers); //sends the email44


exit();

			   //// can here print bank account 
			   
			   
			   
                } 


					}else{
						
						
						
						////// echo online 
						
						
						
						
						//// لمرة واحدة 
						
						
		
						
					 /// لأكثر من مرة 
					 
					 
													$make="INSERT INTO `reservation`(`r_time`, `full_name`, `mobile`, `r_email`, `r_address`, `r_type`, `team_id`, `payable`, `balance`, `r_status`, `date_reserved`, `r_code`, `note`, `price`, `modeofpayment`, `res_id`, `duration`, `info`, `room_id`, `trainers_id`) VALUES 
					('$period','$full_name','$mobile','$email_address','$cat_is','','','','','$r_state','$date_now','$r_code','$get_time_show','$final_price','$payment_type','$res_id','$period_set','$period_msg','$room_id', '0')";
					
					
						
						
			if($period_set <= 1){
						
						/// check firest if check done 
						
						
						
						  if (mysqli_query($con,$make)) {
                          $last_id = $con->insert_id;
              
			   
			   
			   //// echo msg 
			   
			   
			   
			   			   	  echo "<br><div class='alert' role='alert'>
<span class='text-danger'><strong>Your booking status is pending until you pay and you have 10 minutes to complete this step. </strong></span><br>
Your Booking ID: <b>H-$last_id </b> <br>
The details: <br>
You want to book: ".$room_data['room_name']. "<br>
Trainer, <b>".$_POST['trainer_name']. "</b><br> at $date_now <br>For: $period_msg. $get_time_show

<hr>

<div id='ten-countdown' style=' border: 0px solid #004853;
    display:inline;
    padding: 5px;
    color: #004853;
    font-family: Verdana, sans-serif, Arial;
    font-size: 20px;
    font-weight: bold;
    text-decoration: none;'></div><br><br>

<a href='payment.php?id=$last_id&p=$final_price'  class='btn btn-success btn-lg' id='paybtn' >
<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-credit-card-2-front' viewBox='0 0 16 16'>
  <path d='M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z'/>
  <path d='M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z'/>
</svg> </i>Pay Online</a>


</div> <br>";

///if 3 online payment button 



 /// payment button countdown( "ten-countdown", 10, 0 );
// echo '<script> countdown( "ten-countdown", 10, 0 ); </script>'; 
 
 


			   
			    //// can here print bank account whtsapp msg 
				
			   
			   //// can here print bank account 
			   
			   
			   /// payment button 
			   
			   
			   exit();
			   
			   
			   
			   
                }else{
					
					
					/// error 
									 	  
		  echo "<br><div class='alert alert-danger' role='alert'>
Sorry, This period or trainer becomes unavailable please choose different one.
<hr>

<a href='#' onclick='history.go(-1);return false;'>[Go Back]</a>


</div> <br>";

exit();
					
				}
				
				
						
					
						
						
						/// incert 
						
						
						
					}  else {
						
						
						$get_time_show = $fromto_array[$period_set - 1];
								$make="INSERT INTO `reservation`(`r_time`, `full_name`, `mobile`, `r_email`, `r_address`, `r_type`, `team_id`, `payable`, `balance`, `r_status`, `date_reserved`, `r_code`, `note`, `price`, `modeofpayment`, `res_id`, `duration`, `info`, `room_id`, `trainers_id`) VALUES 
					('$period','$full_name','$mobile','$email_address','$cat_is','','','','','$r_state','$date_now','$r_code','$get_time_show','$final_price','$payment_type','$res_id','$period_set','$period_msg','$room_id','$trainer_set')";
					
					
						
						  if(mysqli_query($con,$make)){ 
                          $last_id = $con->insert_id;
						  }
			   //$geter=$date_now.$booking_period;
			   //$r_code2=str_replace(' ', '',$geter);
			   
			   
			   
			   for($n=1;$n <= $period_set - 1;$n++){
				   
				   $r_code2=$allqr_array[$n];
				   
			   $periods_add="INSERT INTO `reservation_support`(`reservation_id`, `r_code`, `r_state`) VALUES
						('$last_id','$r_code2','$r_state')";
						
						
						 mysqli_query($con,$periods_add);
						 
						 
						
			   }	
						
			   //// echo msg 
			   
			   
			   			   	  echo "<br><div class='alert' role='alert'>
<span class='text-danger'><strong>Your booking status is pending until you pay and you have 10 minutes to complete this step. </strong></span><br>
Your Booking ID: <b>PT-$last_id </b> <br>
The details: <br>
You want to book: ".$room_data['room_name']. " <br>
Trainer, <b>".$_POST['trainer_name']. "</b><br> at $date_now <br>For: $period_msg. $get_time_show

<hr>

<div id='ten-countdown' style=' border: 0px solid #004853;
    display:inline;
    padding: 5px;
    color: #004853;
    font-family: Verdana, sans-serif, Arial;
    font-size: 20px;
    font-weight: bold;
    text-decoration: none;'></div><br><br>

<a  href='payment.php?id=$last_id&p=$final_price'  class='btn btn-success' id='paybtn' >
<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-credit-card-2-front' viewBox='0 0 16 16'>
  <path d='M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z'/>
  <path d='M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z'/>
</svg> </i>Pay Now</a>


</div> <br>";

///if 3 online payment button 



 /// payment button countdown( "ten-countdown", 10, 0 );
 //echo '<script> countdown( "ten-countdown", 10, 0 ); </script>'; 
 
 
exit();

			   //// can here print bank account 
			   
			   
			   
                } 

						
						
						
						
						
						
						
					
						
						
						
						
						
						
						
						
						
						
						
					}

				
					
					
					
					////
					
					
					
				
				}else{
				 
				 
				 
				 //////هذه الفترة اصحبت غير متاحة go back 
				 
				 
				 	  
		  echo "<br><div class='alert alert-danger' role='alert'>
Sorry, This period or trainer becomes unavailable please choose different one.
<hr>

<a href='#' onclick='history.go(-1);return false;'>[Go Back]</a>


</div> <br>";




				 
				 exit();
				 
				 
				 
				 
				 
			 }
				
				
		
			 
			 
			 
			 
		 }
		 
		 
		 
		 
		  
	  }else{
		  
		  
		  if(isset($_POST['full_name']) and !isset($_POST['terms'])){
		  ///js back and termas msg 
		  
		  
		  echo "<br><div class='alert alert-danger' role='alert'>
You must agree to our terms and conditions.
<a href='#' onclick='history.go(-1);return false;'>[Go Back]</a>


</div> <br>";

die();



		  }
		  
		  
	  }
	  
	  
	  
	  
   
   $booking_date=$_GET['d'];
   $day_is=date('l, M d, Y', strtotime($booking_date));
   echo "$day_is <br>";
   echo "<strong> $period</strong>"; 
   
   	
   ?>
   
   </div>
   
   <br>
   
   


   <div class="form-group">





    <div class="input-group mb-3">
  <div class="input-group-prepend">
<svg class="bi bi-person-fill text-dark" width="40" height="38" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
</svg>


  </div>
   <input type="text" placeholder="Name*"  name="full_name" value="<?php  echo $_SESSION["Authname"]; ?>" onkeypress="return onlyname(event)"  class="form-control" dir="auto" value="" id="full_name" title="Enter your name in arabic or english within 50 letters only."  required="">



</div>




     <div class="input-group mb-3">
	
  <div class="input-group-prepend">



<svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-telephone-forward text-dark " width="40" height="35" viewBox="0 0 16 16">
 <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg>




  </div>
   <input type="number"    onkeypress="return onlyNumberKey(event)" 
                   maxlength="8" minlength="8" value="<?php  echo $_SESSION["Authphone"]; ?>"  placeholder="Mobile*" name="phone_number" class="form-control"  id="phone_number"     title="Enter your omain number only e.g. 91234567." required>



</div>








   <div class="input-group mb-3">
  <div class="input-group-prepend">

<svg class="bi bi-person-fill text-dark" width="40" height="35" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
</svg>


  </div>
   <input style="direction:LTR;" type="email"  value="<?php  echo $_SESSION["Authlog"]; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  placeholder="Email*" name="email_address" class="form-control big-dog" title="Enter correct format e.g. malak@gmail.com" value="" id="email" required disabled>


</div>



      <center>
	
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="35" fill="currentColor" class="bi bi-stopwatch-fill" viewBox="0 0 16 16">
  <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07A7.001 7.001 0 0 0 8 16a7 7 0 0 0 5.29-11.584.531.531 0 0 0 .013-.012l.354-.354.353.354a.5.5 0 1 0 .707-.707l-1.414-1.415a.5.5 0 1 0-.707.707l.354.354-.354.354a.717.717 0 0 0-.012.012A6.973 6.973 0 0 0 9 2.071V1h.5a.5.5 0 0 0 0-1h-3zm2 5.6V9a.5.5 0 0 1-.5.5H4.5a.5.5 0 0 1 0-1h3V5.6a.5.5 0 1 1 1 0z"/>
</svg>
 
 Duration
 
 
 
  </center>

 
 <br>


 <div class="input-group mb-3">
 


    <select class="form-control" id="exampleFormControlSelect1" name="periods" required>
	
	 <option value="1" selected>One Session</option>
 
	  
	  
<?php  // نشيك من القاعدة بعدين للطباعة نجيب وقت الحجز ونزيد عليه ساعة كل مرة  


//////// نطلع السعر بعد بكم 

/*  <option value="1" selected>1 hour ساعة</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>

*/


//الوقت المطلوب  $period

$different = $duration_is;

/// وقت اغلاق المطعم


$shift=$_GET['s'];

if($shift == 1){
	
	
	$close_time="8:00 PM";
	
}else{
	
	$close_time="8:00 PM";
	
}


$per_is=explode("-",$period);

 
 $duration_info = array();
 
 $from_to = array();
 
 $all_qr = array();
 
 
  

for($i=1;$i<=1000;$i++){
	
	
//$i=1;
	
$timestamp = strtotime($per_is[0]) + $duration_is*60*$i;

$time = date('h:i A', $timestamp);
	
	
$limt_now = $duration_is * $i;

$date1 = "$date_now $time";
$date2 = "$date_now $close_time";


$timestamp1 = strtotime($date1); /// الوقت المطبوع 
$timestamp2 = strtotime($date2);


//$count_me = 60 * $i;
//$hour = round(abs($timestamp2 - $timestamp1) / $count_me,2);

$minutes = abs($timestamp2 - $timestamp1) / 60;

//echo "<option>$i-[$minutes]  ".$per_is[0]."-".$time."</option>";

	if($duration_is != 15){
if($limt_now == $duration_is and $duration_is != 60){
	
	
	$limt_now_show = $limt_now ." minutes";
	
}else{
	
	$hour_count = $limt_now / 60;
	
	if(is_int($hour_count)){
		
		if($hour_count == 1){
			
			$word="hour";
		}else{
			
				$word="hours";
		}
		$limt_now_show = $limt_now / 60  ." $word";
		
	}else{
		
		
			if(intval($hour_count) == 1){
			
			$word="hour";
		}else{
			
				$word="hours";
		}
		
		$limt_now_show = intval($hour_count)  ." $word and ".$duration_is." minutes";
		
	}
	
	
}

	}else{
		
		
		
		$check =$limt_now /  60;
		
	if(!is_int($check) and $limt_now  < 60 ){
	
	
	$limt_now_show = $limt_now  ." minutes";
	
}else{
	
	$hour_count = $limt_now / 60;
	
	if(is_int($hour_count)){
		
		if($hour_count == 1){
			
			$word="hour";
		}else{
			
				$word="hours";
		}
		$limt_now_show = $limt_now / 60  ." $word";
		
	}else{
		
		
			if(intval($hour_count) == 1){
			
			$word="hour";
		}else{
			
				$word="hours";
		}
		
		$limt_now_show = intval($hour_count)  ." $word and ". ($limt_now  -60 * intval($hour_count)  )  ." minutes";
		
	}
	
	
}

	
	
		
		
		
	}

//////حط الفاليو شي تباه بعدين عشان تعرف المحجوز 



$new_price = $price * $i ." OMR";

//echo "<option value='$i' >$limt_now_show - $new_price </option>";


      // $duration_info = array_fill($i, "$limt_now_show - $new_price");
	   
	   
     array_push($duration_info, "$limt_now_show - $new_price");
	 array_push($from_to, $per_is[0]."-".$time);
	 
 
      $show_time = $time_min_1." - ".$time;
	
	    $timestamp2 = strtotime($time) - $duration_is*60;
        $time_min_1 = date('h:i A', $timestamp2);

        $show_time=$time_min_1."-".$time;
        $geter2=$date_now.$show_time."##".$room_id;
		$r_code=str_replace(' ', '',$geter2);
		
		 array_push($all_qr, $r_code);
		 
		 
		/// cheak if approv stop 
		//echo "<option>test- $r_code</option>";
		
		$check_period="SELECT * FROM `reservation` WHERE `r_code` ='$r_code' and `r_status` ='Approved' ";
	    $first_res=mysqli_query($con,$check_period);
			 
	   $check_period2="SELECT * FROM `reservation_support` WHERE `r_code` ='$r_code' and `r_state` ='Approved' ";
	   $second_res=mysqli_query($con,$check_period2);
			 
			 
	   $count1=mysqli_num_rows($first_res);
	   $count2=mysqli_num_rows($second_res);
	   





if($minutes < $duration_is or !empty($count1) or !empty($count2)  ){
	
	
	$i = 1000;
	
	//exit();
	
	
	
}




}







?>



    </select>
	
	
	
		
	</div>
	
	
	<!--
      <center>
	

 <svg xmlns="http://www.w3.org/2000/svg" width="40" height="35" fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z"/>
</svg>
 Trainers
 
 
 
  </center>

 ---> 
 
 <br>


	
	
	
	<input type='hidden' name='arry_sent' value="<?php echo htmlentities(serialize($duration_info)); ?>" />
	<input type='hidden' name='arry_sent2' value="<?php echo htmlentities(serialize($from_to)); ?>" />
	<input type='hidden' name='arry_sent3' value="<?php echo htmlentities(serialize($all_qr)); ?>" />
	
     <?php  
	 
	 echo "<input type='hidden' name='trainer_name' id='trainer_name' value='$t_name_is' />";
	 
	 
	 ?>
	 
	
	
	
	 <div class="input-group mb-3"  >
	  
  <div class="form-check">
  <input class="form-check-input " style="display:none;" type="checkbox" value="" id="terms"  name="terms" style="width:20px;height:20px;" required checked>
 
 <label class="form-check-label" for="terms" style="margin-left:10px;">
 

	
	
	<a data-toggle="modal" data-target="#modalterms" style="display:none;">I agree to the <u>terms and conditions</u>.</a>
	
  </label>
  <br>
  
  
  
  </div>
  
  <br>
  

  
	 <div class="input-group mb-3">
	 
	 
	 </div>







   <button type="submit" class="btn  btn-success btn-block btn-lg border-white" name="dosign"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
</svg> <strong>Confirm</strong> </button>


   </center>



</div>





   </form>
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>

	
	
	
	<div class="modal fade" id="finalmod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>







	</div>
	
	

	
	

	
	
	
	
	
<div class="modal fade bg-light " id="modalterms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Terms and conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
	  
	  
	  
        <p style="text-align: left;">
		
-Please adhere to the chosen time. <br>


		
		<?php //echo $res_data['terms']; ?></p>
	  </div>
	  
	  
      <div class="modal-footer">
   
   
        <button type="button" class="btn btn-info btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	
	
			
				
	
	
	
				<?php //include('right-sidebar.php');?>		
			
			

		

		
	
		
<div class="footer">

	
<?php //include 'footer.php';?> 

</div>	


 



<?php include 'script.php';?>



<script>



    function onlyname(evt) {
		
		
		
		nameval = document.getElementById("full_name").value;

		
		if(nameval.length > 49 ){
			
			
			return false;
			
			///msg 
			
			
			
		}
		
		
		const re = /^(?:(?=[\p{Script=Arabic}A-Za-z])\p{L}|\s|-.`',)+$/u;
       
       
	   if(nameval.length > 0 ){
	   //alert(re.test(nameval))
	   var check = re.test(nameval);
	   
	   
	   if(check == false){
		     document.getElementById("full_name").value = nameval.slice(0, -1);
		   	return false;
			
			//msg 
			
	   }
	     

	   }
          
  
    }
	
	
	
	
	


    function onlyNumberKey(evt) {
		
		
		
		numberval = document.getElementById("phone_number").value;

		
		if(numberval.length > 7 ){
			
			
			return false;
			
		}
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
			
            return false;
		 

		
        return true;
    }
</script>



 <script type="text/javascript">
 
 
 function countdown( elementName, minutes, seconds )
{
    var element, endTime, hours, mins, msLeft, time;

    function twoDigits( n )
    {
        return (n <= 9 ? "0" + n : n);
    }

    function updateTimer()
    {
        msLeft = endTime - (+new Date);
        if ( msLeft < 1000 ) {
            element.innerHTML = "Time is up!";
			var link = document.getElementById('paybtn');
            link.style.display = 'none';
        } else {
            time = new Date( msLeft );
            hours = time.getUTCHours();
            mins = time.getUTCMinutes();
            element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
            setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
        }
    }

    element = document.getElementById( elementName );
    endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
    updateTimer();
}




 

var phone_number = document.getElementById('phone_number');
var email = document.getElementById('email');
var name = document.getElementById('full_name');



/*
name.oninvalid = function(event) {
    event.target.setCustomValidity(event.target.title);
}


phone_number.oninvalid = function(event2) {
phone_number.setCustomValidity(event2.target.title);
}

 


email.oninvalid = function(event3) {
    event3.target.setCustomValidity(event3.target.title);
}
*/












        jQuery(document).ready(function ($) {

            var jssor_1_SlideoTransitions = [
              [{b:-1,d:1,o:-1},{b:0,d:1000,o:1}],
              [{b:1900,d:2000,x:-379,e:{x:7}}],
              [{b:1900,d:2000,x:-379,e:{x:7}}],
              [{b:-1,d:1,o:-1,r:288,sX:9,sY:9},{b:1000,d:900,x:-1400,y:-660,o:1,r:-288,sX:-9,sY:-9,e:{r:6}},{b:1900,d:1600,x:-200,o:-1,e:{x:16}}]
            ];

            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*responsive code end*/
        });
    
	
	
	
	
	
	
	
	
	</script>
	
	
	<script>
	
	let nav = document.querySelectorAll('nav')

if (nav) {
  let navLinks = document.querySelectorAll('nav a')
  let activeLink = document.querySelector('.active')
  activeLink.scrollIntoView({ behavior: "smooth", inline: "center" })
  
  navLinks.forEach( function(link) {
    link.addEventListener("click", (event) => {
      navLinks.forEach( function(link) {
        link.classList.remove('active')
      })
      link.classList.add('active')
      link.scrollIntoView({ behavior: "smooth", inline: "center" })
    })
  })
}

	
	
	</script>
	
	
	
	
	
	
	
	
	
	<script>
$(document).ready(function() {
            $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
            $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
        });
	
	
	
	function custom_template(obj){
        	var data = $(obj.element).data();
        	var text = $(obj.element).text();
			document.getElementById("trainer_name").value = text;
        	if(data && data['img_src']){
	        	img_src = data['img_src'];
				des = data['des'];
	        	template = $("<br><div><center><img src=\"" + img_src + "\" style=\"width:100%;height:150px;\"/><p style=\"font-weight: 700;font-size:10pt;text-align:center;\">" + des + "</p></center></div>");
	        	return template;
	        }
        }
	var options = {
		'templateSelection': custom_template,
		'templateResult': custom_template,
	}
	$('#id_select2_example').select2(options);
    $('.select2-container--default .select2-selection--single').css({'height': '220px'});


	</script>
</body>
</html>



