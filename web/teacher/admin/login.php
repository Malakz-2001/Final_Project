<?php //session_start();

include('../includes/dbcon.php');


//exit();



if(isset($_POST['login']))
{
    
    

//$user_unsafe=$_POST['username'];
$pass_unsafe=$_POST['password'];

//$user = mysqli_real_escape_string($con,$user_unsafe);
$pass = mysqli_real_escape_string($con,md5($pass_unsafe));
$user="admin";
$query=mysqli_query($con,"select * from user where username='$user' and password='$pass'")or die(mysqli_error($con));
		$row=mysqli_fetch_array($query);
           $id=$row['user_id'];
          /*  $first=$row['admin_first'];
           $last=$row['admin_last']; */
           $counter=mysqli_num_rows($query);

		  	if ($counter == 0) 
			  {	
				  echo "<script type='text/javascript'>alert('Invalid Username or Password!');
				  document.location='index.php'</script>";
			  } 
			  else
			  {
				  
				
				  
			//	  $_SESSION['id']=$id;	
				  /* $_SESSION['name']=$first." ".$last; */
				  
				  if($id == "1"){
    $_SESSION["RESTID"] =$id;
    $_SESSION['id']= $id;	
	
				  }
			  	echo "<script type='text/javascript'>document.location='reservation.php'</script>";  
			  }
}
?>