<?php

//session_start();


ini_set('display_errors',1);
error_reporting(E_ALL);

include 'header2.php';?>
<?php // include 'header.php';?>




<body>

<div class="container">
	<?php include 'navbar.php';?>
	<?php //include baners  'menu-tab.php';?>
	
	
			
	<?php
		
		$res_id=htmlspecialchars($_GET['b'], ENT_QUOTES, 'UTF-8'); 
		
		$res_id="1";
		//// res data 

		
		
		
		 echo "<title>$title_is Booking</title>";
	   ///timing 
	   
	   
	
		
		
		
		?>
			
		
	
		
	
		<div class="container-fluid">
		
		
		
		
		<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">

  
  <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li> 
  </ul>
  <div class="carousel-inner">
  
  
  <?php
    

	
	
	
	 $url="img/teacher/1.png";
 echo'   <div class="carousel-item ">
      <img src="'.$url.'"  width="1100" height="500">
         <div class="carousel-caption">
      
      </div> 
	  </div>';
		 $url="img/teacher/2.jpg";
 echo'   <div class="carousel-item ">
      <img src="'.$url.'"  width="1100" height="500">
         <div class="carousel-caption">
      
      </div> 
	  </div>';
	  
	  
  	 $url="img/teacher/3.jpeg";
 echo'   <div class="carousel-item ">
      <img src="'.$url.'"  width="1100" height="500">
         <div class="carousel-caption">
      
      </div> 
	  </div>';
	  
// 	  	 $url="img/teacher/4.jpeg";
//  echo'   <div class="carousel-item ">
//       <img src="'.$url.'"  width="1100" height="500">
//          <div class="carousel-caption">
      
//       </div> 
// 	  </div>';
	  
// 	  	 $url="img/teacher/5.jpeg";
//  echo'   <div class="carousel-item ">
//       <img src="'.$url.'"  width="1100" height="500">
//          <div class="carousel-caption">
      
//       </div> 
// 	  </div>';
	  
	  
	  	 $url="img/teacher/2.jpg";
 echo'   <div class="carousel-item active">
      <img src="'.$url.'"  width="1100" height="500">
         <div class="carousel-caption">
      
      </div> 
	  </div>';

	?>
 


  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>		
					
			



				
					
							
						
							
							

				


<div class="row">


 <div class="col-lg-8">  
	<h4 class="text-dark col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<?php echo "Peer Tutor";?>
	
		<img src="img/main.png" class="img-fluid" alt="Logo" width="100" height="100">


	</h4>
	</div>
  <div class="col-sm-12">

  <h5 class="text-dark col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php 
  
  $time_is="8:00 AM - 4:00 PM";
  
  echo "<i class='fa fa-clock-o' aria-hidden='true'></i> ".$time_is;?>
  </h5>
  
  </div>
  
 
	
	</div>
	
	
<div class="row">
<div class="col-lg-12">  
	<!---<p class="text-dark col-lg-6 col-md-6 col-sm-6 col-xs-6"><?php// echo $des_is;?></p> --->
	</div>
	</div>
	<hr>
	
	
	
	
	
	
	<!--- categories here --->
	
	
	
	<div class="row">
	
<div class="col-lg-12">  
	<div class="scrollmenu">
	
	
	<?php
	
	$get_cat="SELECT * FROM `category` WHERE `res_id` ='$res_id' order by cat_id desc";
	$cat_res=mysqli_query($con,$get_cat);
	
	
	
///////////////// menu-tab 

    if(isset($_SESSION["Authlog"])){

	////myModallog
			echo '<a class="btn btn-danger " href="logout.php"><b>Logout</b></a>  ';
			
			
			echo '<a class="btn btn-info " data-toggle="modal" data-target="#myModallist"><b>My Booking</b></a>  ';
			
			
		//myModasingup
	}else{
		
		echo '<a class="btn btn-info " data-toggle="modal" data-target="#myModallog"><b>Login</b></a>  ';
	    echo '<a class="btn btn-info" data-toggle="modal" data-target="#myModasingup"><b>Sing up</b></a>  ';
	}
		
			echo '<a class="btn btn-info" data-toggle="modal" data-target="#myModal"><b>About US</b></a>  ';
		
		
	while($catdata=mysqli_fetch_array($cat_res)){
		
		
		$cat_name=$catdata['cat_name'];
		$cat_id=$catdata['cat_id'];
		
	}
	
	
	
	
	
	
	
	
	
	
	?>
	
	


  
</div>
	
	</div>
	
	</div>

	
	
	
	
	

	<!--- Room and iteam print
	
	
 <div class="row">
        <div class="col-lg-12 my-3">
            <div class="pull-right">
                <div class="btn-group">
                    <button class="btn" id="list">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list-task" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z"/>
  <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z"/>
  <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z"/>
</svg>
                    </button>
                    <button class="btn " id="grid">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-grid" viewBox="0 0 16 16">
  <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
</svg>
                    </button>
                </div>
            </div>
        </div>
    </div> 
	
	 ---><br>
    <div id="products" class="row view-group">
	
	
	
	
	
	<?php        


	$get_cat="SELECT * FROM `category` WHERE `res_id` ='$res_id' order by cat_id desc";
	$cat_res=mysqli_query($con,$get_cat);


	while($catdata=mysqli_fetch_array($cat_res)){
		
		$cat_id=$catdata['cat_id'];
		
	
		
	
		
		
     $get_all_item="SELECT * FROM `rooms`";

     $item_res=mysqli_query($con,$get_all_item);
	 

	
	while($itemdata=mysqli_fetch_array($item_res)){
		
		
		

		
		
		
		$room_is=$itemdata['room_id'];
		$res_is=$itemdata[7];
		
		
		
		echo '
		
		
		 <div class="item col-xs-4 col-lg-4">
                    <div class="thumbnail card">
                        <div class="img-event">
                            <img class="group list-group-image img-fluid" style="width:700px;height:250px; object-fit: contain;" height="250px" src="images/'.$itemdata[6].'" alt="" />
                        </div>
                        <div class="caption card-body">
                            <h4 class="group card-title inner list-group-item-heading">
                                '.$itemdata[1].'</h4>
                            <p class="group inner list-group-item-text">
                                '.$itemdata[4].'
								</p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                
                                </div>';
								
								
						 if(isset($_SESSION["Authlog"])){
									
									echo '
                                <div class="col-xs-12 col-md-6">
                                    <a class="btn btn-lg btn-info" href="book.php?a='.$room_is.'&b='.$res_is.'"><b>Choose</b></a>
                                </div>';
								
								
								}
								


echo'							  
                            </div>
                        </div>
                    </div>
                </div>

			  
			  ' ;
			  
			  
		
		
		
		
		
	}
	





	}


	?>
               
			  
			  
			  
			  
            </div>
	
	
	
	
	<br>
	<br>
	



	
	</div>
	
	

	
	

			<!-- The Modal about -->
<div class="modal" id="myModallist" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Booking List</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
	  <p style="text-align: justify;
  text-justify: inter-word;">
<?php

///save comment


if(isset($_POST['myfeedback'])){
	
	
	
	$Feedback=$_POST['myfeedback'];
	$booking_id=$_POST['mybooking'];
	
	$setfeed="INSERT INTO `booking_comment`(`comment`, `reservation_id`) VALUES ('$Feedback','$booking_id')";
	
	if(mysqli_query($con,$setfeed)){
		
		
		
		 echo "<script>
alert('Your feedback has been successfully sent.');
window.location.href='index.php';
</script>";
		
		
	}


	
	
	
	
	
	
}






$log_mail=$_SESSION["Authlog"];

$getbooking="SELECT * FROM `reservation` WHERE `r_email` ='$log_mail' ";

$book_q=mysqli_query($con,$getbooking);

while($row=mysqli_fetch_array($book_q)){
	
	
	
	//echo "PT-".$row[0]."<hr>";
	
	$r_id=$row[0];
	echo '<a class="btn btn-danger" data-toggle="collapse" href="#collapseExample'.$row[0].'" role="button" aria-expanded="false" aria-controls="collapseExample'.$row[0].'">

PT-'.$row[0].' '.$row['date_reserved']. ' '.$row['note'].'



  </a> <hr>';
  
  
  
  
  ///check if 
  
  
  $check_comment="SELECT * FROM `booking_comment` WHERE `reservation_id` ='$r_id'";
  $res_comment=mysqli_query($con,$check_comment);
  $count_comment=mysqli_num_rows($res_comment);
  
  
  if(empty($count_comment)){
	  
	  //// make input 
  
  echo '
  <div class="collapse" id="collapseExample'.$row[0].'">
  <div class="card card-body">
  <form action="" method="post">
  <div class="form-group">
   
    <input type="text" name="myfeedback" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Type your feedback." required>
     <input type="hidden" name="mybooking" value="'.$row[0].'">
	
	
	<small id="emailHelp" class="form-text text-muted">We never share your feedback with anyone else.</small>
  </div>
    <button type="submit" class="btn btn-info">Send</button>
</form>
  

  </div>
  <br>
  </div>
  ';
  }else{
	  
	  $get_comment=mysqli_fetch_array($res_comment);
	  
	  
	    echo '
  <div class="collapse" id="collapseExample'.$row[0].'">
  <div class="card card-body">
  <b><font color="green">Feedback submitted.</font></b> <br>
'.$get_comment['comment'].'
  </div>
  <br>
  </div>
  ';
	  
  }
  
  
  
	
}





?>


  </p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


	
	
			
				
	
	
	
				<?php //include('right-sidebar.php');?>		
			
			

		

		<!-- The Modal about -->
<div class="modal" id="myModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">About Us</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
	  <p style="text-align: justify;
  text-justify: inter-word;">
The main goal of this application is to develop and enhance peer education at Middle East College by creating an application called An Android Mobile application for Peer Tutoring Monitoring and Assistance, which helps in communication between the student and the peer teacher and the student’s understanding of all the materials that needs.
  <hr>
  <h4>Contact:</h4><br>
  <div class="row">
  <div class="col-sm-6">
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-check" viewBox="0 0 16 16">
  <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
  <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
</svg>

<a href="mailto: malakalzeidi@gmail.com">malakalzeidi@gmail.com</a>

</div>
  <div class="col-sm-3">
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
  <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg>

<a href="tel:+96893375256">93375256</a>
  </div>
  <div class="col-sm-3"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
  <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
  <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>
<a href="https://www.google.com/maps/place/%D9%83%D9%84%D9%8A%D8%A9+%D8%A7%D9%84%D8%B4%D8%B1%D9%82+%D8%A7%D9%84%D8%A3%D9%88%D8%B3%D8%B7%E2%80%AD/@23.5676873,58.1676317,15z/data=!4m6!3m5!1s0x3e8de2a1c1ede397:0x5d23dbf6d52a9f68!8m2!3d23.5676873!4d58.1676317!16s%2Fm%2F0bm9gp1?entry=ttu" target="_blank">Muscat</a>
</div>
</div>



  
  </p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>




		
			<!-- The Modal login -->
<div class="modal" id="myModallog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
	  
        <h4 class="modal-title">Login</h4>
				<img src="img/main.png" class="img-fluid" alt="Logo" width="150" height="150">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
 <form role="form" action="" method="post">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> <b>Email</b></label>
              <input type="text" class="form-control" name="lemail" id="usrname" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span><b> Password</b></label>
              <input type="password" class="form-control" id="psw" name="lpass" placeholder="Enter the password" required>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked> Remember me</label>
            </div>
              <input type="submit" class="btn btn-info btn-block" value="Login" name="login" ><span class="glyphicon glyphicon-off"></span> 
      </div>
</form>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>



 <div class="modal fade" id="myModasingup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
               
                       <h4 class="modal-title">Sing up</h4>
				<img src="img/main.png" class="img-fluid" alt="Logo" width="150" height="150">
				
				   <button type="button" class="close" data-dismiss="modal">&times;</button>
                       


					   </div>
                        <div class="modal-body">
                            <form class="pb-modalreglog-form-reg" action="" method="post">
                                <div class="form-group">
                                    <div id="pb-modalreglog-progressbar"></div>
                                </div>
								
								<div class="form-group">
                                    <label for="email">Name</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" name="uname" class="form-control" id="inputEmail" placeholder="Enter your full name" pattern="[\u0600-\u06FF\sA-Za-z ]*" minlength="5" required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                        <input type="email" name="uemail"  class="form-control" id="inputEmail" placeholder="Enter your email" required>
                                    </div>
                                </div>
								 <div class="form-group">
                                    <label for="email">Mobile</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" name="uemobile"  class="form-control" id="inputEmail" placeholder="Enter your mobile number" pattern="\d*" minlength="8" maxlength="8" required>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                        <input type="password" name="upass" class="form-control" minlength="6" id="inputPws" placeholder="Enter your password" required>
                                    </div>
                                </div>
                             
                                <!-- <div class="form-group">
                                    <label for="country">Date of birth- Allowed age is 7-40 years</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                                        <input type="date" name="udate" class="form-control" id="input-date" onchange="countYears();" placeholder="Date" required>
                                    </div>
                                </div> -->
                            
                                 <input type="hidden" class="form-control"  id="result" name="age"  placeholder="Age" disabled />
                <input type="hidden" class="form-control"  id="result2" name="agecount"  placeholder="Age"  />
                            <br>
							
							 <input type="submit" class="btn btn-info btn-block" value="Sign up" name="reg" onclick="checkAge();">
							</form>
							
							    <!-- <script>
      // Define the countYears function
      function countYears() {
        // Get the input date from the user
        let input = document.getElementById("input-date").value;
     
        // Parse the input date
        let inputDate = new Date(input);

        // Get the current date
        let currentDate = new Date();

        // Calculate the difference between the two dates in milliseconds
        let diff = currentDate - inputDate;

        // Convert the difference from milliseconds to years and round down to the nearest integer
        let years = Math.floor(diff / 1000 / 60 / 60 / 24 / 365);

        // Save the result in the hidden input field
        document.getElementById("result").value = "Age: " + years +" Years old.";
		document.getElementById("result").type = "text";
        document.getElementById("result2").value =years;
      }
	  
	        function checkAge() {
				
				let age =  document.getElementById("result2").value;
			if (age >= 7 && age <= 40) {
  // Do something if the input is equal to 7 and not greater than 40
}else{
	
	
	 event.preventDefault();

  // Display an alert message
  alert('Yor age must be 7-40 years to create account with us.');
	
}
				
				
			}
	  
	  
    </script> -->
	
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                           
							
				         </div>
                    </div>
                </div>
            </div>
      
	
<?php 


if(isset($_POST['login'])){
	

// Access the email field
$uemail = $_POST['lemail'];



// Access the password field
$upass = $_POST['lpass'];


$pass = mysqli_real_escape_string($con,md5($upass));
// check email 
$sql_check = "SELECT * FROM `user` WHERE `username` = '$uemail' and password='$pass'";
$res_email=mysqli_query($con, $sql_check);
$check_count=mysqli_num_rows($res_email);
$user_data=mysqli_fetch_array($res_email,MYSQLI_ASSOC);
if(!empty($check_count)){
	
	

 //// make session and redirect 
 
 $_SESSION["Authlog"]= $uemail;
 $_SESSION["Authname"]= $user_data['full_name'];
 $_SESSION["Authphone"]= $user_data['mobile'];
   
 
 echo "<script>
window.location.href='index.php';
</script>";







	exit();
}else{
	
	

	
	 echo "<script>
alert('The data used is incorrect, try again.');


$('#myModallog').modal('show');

//history.back(-1);


</script>";




	exit();
}
	
	
	
}

/////////////////login 


if(isset($_POST['reg'])){
	
	
	$uname = $_POST['uname'];

// Access the email field
$uemail = $_POST['uemail'];

// Access the mobile number field
$uemobile = $_POST['uemobile'];

// Access the password field
$upass = $_POST['upass'];

// Access the date of birth field
$udate = '';


$upass =md5($upass);
$sql_add = "INSERT INTO `user`(`full_name`, `username`, `mobile`, `password`, `birth_date`, `role`) VALUES
 ('$uname','$uemail','$uemobile','$upass','$udate','user')";

// Execute the query


// check email 
$sql_check = "SELECT * FROM `user` WHERE `username` = '$uemail' ";
$res_email=mysqli_query($con, $sql_check);
$check_count=mysqli_num_rows($res_email);

if(empty($check_count) and mysqli_query($con, $sql_add)){
	
	
	echo '<div class="alert alert-success" role="alert">
Your account has been successfully registered and will be used to log you in automatically. <br>
</div>';
 //// make session and redirect 
 
 $_SESSION["Authlog"]= $uemail;
 
 $_SESSION["Authname"]= $uname;
 $_SESSION["Authphone"]= $uemobile;
 
 
 
 echo "<script>
alert('Your account has been successfully registered and will be used to log you in automatically.');
window.location.href='index.php';
</script>";


 
	exit();
}else{
	
	
	echo '<div class="alert alert-danger" role="alert">
This email:'.$uemail.' has been used, please try another email.
</div>';
	
	
	 echo "<script>
alert('This email: $uemail has been used, please try another email.');


$('#myModasingup').modal('show');

//history.back(-1);


</script>";




	exit();
}
	
	
	
}




?>
		
<div class="footer">

	
<?php //include 'footer.php';?> 

</div>	
<?php include 'script.php';?>
 <script type="text/javascript">
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
	
	</script>
	</div>
</body>
</html>



