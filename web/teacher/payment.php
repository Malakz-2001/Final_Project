<?php


error_reporting(0);


?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Payment Page</title>
  </head>
  <body>
  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
				
			<br>
			
			<br>

<div class="container">


<a  href="index.php">
	 <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-box-arrow-left text-dark" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg>

</a>


        <div class="row">
            <div class="col-lg-4 mb-lg-0 mb-3">
			

			
			
                <div class="card p-3">
                    <div class="img-box">
                        <img src="img/visa.png" alt="">
                    </div>
                    <div class="number">
                        <label class="fw-bold" for=""></label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <small><span class="fw-bold"></span><span></span></small>
                        <small><span class="fw-bold"></span><span></span></small>
                    </div>
                </div>
            </div>
         
     
            <div class="col-12 mt-4">
                <div class="card p-3">
                    <p class="mb-0 fw-bold h4">Payment Methods</p>
                </div>
            </div>
            <div class="col-12">
                <div class="card p-3">
                    <div class="card-body border p-0">
                 
                        <div class="collapse p-3 pt-0" id="collapseExample">
                            <div class="row">
                                <div class="col-8">
                                    <p class="h4 mb-0">Summary</p>
                                    <p class="mb-0"><span class="fw-bold">Product:</span><span class="c-green">: Name of
                                            product</span></p>
                                    <p class="mb-0"><span class="fw-bold">Price:</span><span
                                            class="c-green">:452.90</span></p>
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border p-0">
                        <p>
                            <a class="btn btn-primary p-2 w-100 h-100 d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                                aria-controls="collapseExample">
                                <span class="fw-bold">Credit Card</span>
                                <span class="">
                                    <span class="fab fa-cc-amex"></span>
                                    <span class="fab fa-cc-mastercard"></span>
                                    <span class="fab fa-cc-discover"></span>
                                </span>
                            </a>
                        </p>
                        <div class="collapse show p-3 pt-0" id="collapseExample">
                            <div class="row">
                                <div class="col-lg-5 mb-lg-0 mb-3">
                                    <p class="h4 mb-0">Summary</p>
                                    <p class="mb-0"><span class="fw-bold">Product</span><span class="c-green"> Horse training</span>
                                    </p>
                                    <p class="mb-0">
                                        <span class="fw-bold"> Price</span>
                                        <span class="c-green"><?php echo $_GET['p']; ?> OMR</span>
                                    </p>
                                    <p class="mb-0"></p>
                                </div>
                                <div class="col-lg-7">
                                    <form action="<?php echo"payment.php?id=".$_GET['id']."&p=".$_GET['p']; ?>" method="post"  class="form">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form__div">
                                                    <input type="text" name="card_number" class="form-control" placeholder="4228205498920922" minlength="16" pattern="\d{16}"   required>
                                                    <label for="" class="form__label">Card Number</label>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form__div">
                                                    <input type="text" class="form-control" placeholder="12/24" pattern="\d{2}/\d{2}"  required>
                                                    <label for="" class="form__label">MM / yy</label>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form__div">
                                                    <input type="password" class="form-control" placeholder="123" pattern="\d{3}"  minlength="3" required>
                                                    <label for="" class="form__label">cvv code</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form__div">
                                                    <input type="text" class="form-control" placeholder="Card holder name" minlength="5" pattern="[a-zA-Z-' ]+" required>
                                                    <label for="" class="form__label"></label>
													<br>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <input type="submit" class="btn btn-primary w-100" value="Confirm">
                                            </div>
                                        </div>
                                    </form>
                                </div>
								
								
								<?php
								
								
								
							
                include 'includes/dbcon.php'; 


				if(isset($_POST['card_number'])){
					
					$booking_id=$_GET['id'];
					
					
					$change_card="UPDATE `reservation` SET `r_status`='Approved' WHERE `rid` ='$booking_id' ";
					
					if(mysqli_query($con,$change_card)){
						
						
						
						
						echo "<br><font color='green'><b>Your reservation has been confirmed successfully.</b></font><hr>
						<a href='index.php'>Go Back</a> <br>
						";
					}
					
					
					
					
					
				   }
								
								
								
								?>
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                
				
				<!---<div class="btn btn-primary payment" onclick="alert('This for test only.')">
                    Make Payment
                </div>---> 
				
				
            </div>
        </div>
    </div>
	
	<br>
	<br>
	
	
	</body>
</html>