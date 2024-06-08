<?php 

include('../includes/dbcon.php');
	
	$category = $_POST['category'];
	
	$result = mysqli_query($con,"SELECT cat_name FROM category where cat_name='$category' and res_id = '$res_id' "); 
        $count = mysqli_num_rows($result);

        if ($count==0)
        {
			mysqli_query($con,"INSERT INTO category (cat_name,res_id)
				VALUES('$category','$res_id')")or die(mysqli_error());  
				
				
				
				
				
				echo "<script type='text/javascript'>alert('Successfully added new category!');</script>";
				echo "<script>document.location='category.php'</script>";   
		}
		else
		{	
				echo "<script type='text/javascript'>alert('Category already added!');</script>";
				echo "<script>document.location='category.php'</script>";  
		}
	
?>