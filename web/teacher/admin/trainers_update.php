<?php
include('../includes/dbcon.php');

 if (isset($_POST['update']))
 { 
	$id = $_POST['id'];
	$menu = $_POST['menu'];
	$cat = $_POST['cat'];
	$subcat = $_POST['subcat'];
	$desc = $_POST['desc'];
	$price = $_POST['price'];
	 
	 $image = $_FILES["image"]["name"];
		if ($_FILES['image']['size'] == 0)

		 {
			//$name=$_POST['image1']; 
			
			$update_q="UPDATE `trainers` SET `name`='$menu',`desc`='$desc' WHERE id ='$id'";
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
									
			$update_q="UPDATE `trainers` SET `name`='$menu',`desc`='$desc',pic='$new_name' WHERE id ='$id'";
					move_uploaded_file($temp, "../images/".$new_name);
				      }
					}
			}	
			
			
	 mysqli_query($con,$update_q)
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Successfully updated the trainer details!');</script>";
		echo "<script>document.location='trainers.php'</script>";
	
} 

