<?php 
//session_start();


include 'header.php';

include '../includes/dbcon.php';





//session_destroy();

if(isset($_SESSION["RESTID"]) and isset($_SESSION['id'])){
	
	
	    // header("Location: dashboard.php");
	
	
	//exit();
}


$auth=$_GET;

//print_r($auth);



//echo "hi";




echo "hi";

// $check="SELECT * FROM `restorants` WHERE `id` ='".htmlspecialchars($auth['id'])."' and `user_id` ='".htmlspecialchars($auth['uid'])."' and `subdomain` ='".htmlspecialchars($auth['domain'])."' ";

// $check_res=mysqli_query($con2,$check);

// $log=mysqli_num_rows($check_res);


if(!empty($log)){
    
    
    
    $_SESSION["RESTID"] =$auth['id'];
    $_SESSION['id']= $auth['id'];	
    
    
    
    
    
    
   
   /* echo '<script type="text/javascript">
           window.location = "dashboard.php"
      </script>';
      */
      
      
      
      
      
      
      
     header("Location: reservation.php");
    
    
}else{



//print_r($auth);


//echo $auth[id];


//exit();


}

//exit();




?>


<body class = "admin_body" style = "background-color:#343434 !important; background:none;">

<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    
    <a style = "color:white;" href="../index.php"></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"> Peer Tutor Administrator</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="../img/key.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" action = "login.php"method = "POST">
      <div class="input-group">
        <input type="hidden" name = "username" class="form-control" placeholder="username" value = "admin">
        <input type="password" name = "password" class="form-control" placeholder="password" autofocus>

        <div class="input-group-btn">
          <button name = "login"class="btn"><i class="fa fa-arrow-right "></i></button>
        </div>
      </div>
    </form>
	
	
	
    <!-- /.lockscreen credentials -->

  </div>
	
		

<!-- JS -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>