<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index.php');
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>Category - <?php include('../includes/title.php');?></title>
  <?php include('../includes/links.php');?>
  
</head>

<body>

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
  
    <div class="conjtainer">
      <!-- Menu button for smallar screens -->
      <div class="navbar-header">
      <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
      <span>Menu</span>
      </button>
      <!-- Site name for smallar screens -->
      <a href="index.html" class="navbar-brand hidden-lg">Chimney</a>
    </div>
      
      <?php include('../includes/topbar.php');?>
    

    </div>
  </div>



<!-- Main content starts -->

<div class="content" style="margin-top:10px">

    <!-- Sidebar -->
    <?php include('../includes/sidebar.php');?>

    <!-- Sidebar ends -->

        <!-- Main bar -->
    <div class="mainbar">
      
      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-home"></i> Dashboard</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a target="_blank" href="../index.php?b=<?= $res_id; ?>" ><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Maintenance</a>
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Category</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->



       <!-- Matter -->

      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-6">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left"> Terms and Conditions
                   
                  </div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
          
<?php
include('../includes/dbcon.php');

    $query=mysqli_query($con,"SELECT * FROM `restorants` WHERE `id` = '$res_id' ")or die(mysqli_error($con));
     $row=mysqli_fetch_array($query);
     $terms=$row['terms'];
	 
	 
	 ///// action here 
	 
	 if(isset($_POST['terms_is'])){
		 
		 
		 
		 $terms_data=htmlspecialchars($_POST['terms_is'], ENT_QUOTES, 'UTF-8'); 
		 
		 
		 $update_terms="UPDATE `restorants` SET `terms`='$terms_data' WHERE `id` =  '$res_id'";
		 
		 if(mysqli_query($con,$update_terms)){
			 
			 
			 echo '<div class="alert alert-success" role="alert">
  Terms update successfully.
</div>';
			 
			 
			 
			 echo "
			 
			  <script>
         setTimeout(function(){
            window.location.href = 'terms.php';
         }, 2000);
      </script>
			 
			 
			 ";
			 
			 
		 }
		 
		 
		 
		 
	 }
	 

?>                      
                      
<form action="" method="post">
              
<textarea class="form-control" dir="auto" name="terms_is" id="exampleFormControlTextarea1" placeholder="Enter here your terms." rows="10" cols="10"
 style="resize:none;font-size: 20px;font-weight: bold;" required><?php
 if(strlen($terms)>1){
	 echo $terms;
	 }
	 
 ?></textarea>
			  
			  <br>
			  
			  
			   <button type="submit" class="btn btn-primary btn-block btn-lg">Save</button>
			   
			   
			  </form>
			  
			  
                  <div class="clearfix"></div>
                </div>
                </div>
              </div>

          
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>  
              
            </div>
          </div>
        </div>
      </div>

    <!-- Matter ends -->


    </div>

   <!-- Mainbar ends -->
   <div class="clearfix"></div>

</div>
<!-- Content ends -->

<!-- Footer starts -->
<?php include('../includes/footer.php');?>  

<!-- Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 

<!-- Modal -->
<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Add New Event</h4>
            </div>
            <div class="modal-body">
              <!--start form-->
              <form class="form-horizontal" method="post" action="category_save.php">
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Category Name</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="category" id="title" placeholder="Category Name" required>
                      </div>
                  </div> 

                  <!-- Buttons -->
                  <div class="form-group">
                      <!-- Buttons -->
                      <div class="col-lg-offset-2 col-lg-6">
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                       </div>
                  </div>
              </form>
              <!--end form-->
            </div>
            
        </div><!--modal content-->
    </div><!--modal dialog-->
</div>
<!--end modal-->  
<?php
    if (isset($_POST['del']))
    {
    $id=$_POST['id'];

  // sending query
  mysqli_query($con,"delete from category WHERE cat_id='$id'")
  or die(mysqli_error());
  echo "<script>document.location='category.php'</script>";
    }
    ?>
<!-- JS -->
<?php include('../includes/js.php');?>  

</body>
</html>