<?php 

include('../includes/dbcon.php');
	
	$menu = $_POST['menu'];
	$cat = $_POST['cat'];
	$subcat = $_POST['subcat'];
	$desc = $_POST['desc'];
	$price = $_POST['price'];
	$duration = $_POST['duration'];
	$payment_type = $_POST['payment'];
	

	$result = mysqli_query($con,"SELECT * FROM `trainers` where name ='$menu'"); 
        $count = mysqli_num_rows($result);

        if ($count==0)
        {

			$name = $_FILES["image"]["name"];
			if ($name=="")
			{
				$name="default.gif";
			}
			else
			{
				$name = $_FILES["image"]["name"];
				$type = $_FILES["image"]["type"];
				$size = $_FILES["image"]["size"];
				$temp = $_FILES["image"]["tmp_name"];
				$error = $_FILES["image"]["error"];
			    $imageFileType = strtolower(pathinfo($name,PATHINFO_EXTENSION));
				
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
         //   echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
            } else {
             echo "File is not an image.";
             $error = 1;
             }


if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $error = 1;
}



				
				
				if ($error > 0){
					die("Error uploading file! Code $error.");
					}
				else{
					if($size > 100000000000) //conditions for the file
						{
						die("Format is not allowed or file size is too big!");
						}
				else
				      {
						  
						  $new_name=uniqid().".$imageFileType";
						
					move_uploaded_file($temp, "../images/".$new_name);
				      }
					}
			}	
				
				
				if(mysqli_query($con,"INSERT INTO `trainers`( `name`, `desc`, `pic`, `res_id`) VALUES 
				('$menu','$desc','$new_name','1')")){  
			

            

			

			echo "<script type='text/javascript'>alert('Successfully added new trainer!');</script>";
					echo "<script>document.location='trainers.php'</script>";  

				}					
		}
		else
		{
					echo "<script type='text/javascript'>alert('Trainer with same name already added!');</script>";
					echo "<script>document.location='trainers.php'</script>";  
		}	
?>