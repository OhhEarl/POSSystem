<?php

include('db_connect.php');
include('header.php');


if(isset($_POST['update_customer'])){
    $update_id = $_POST['update_c_id'];
    $update_name = $_POST['update_name'];
    $update_contact = $_POST['update_contact'];
    $update_address = $_POST['update_address'];

    mysqli_query($conn, "UPDATE `customer_list` SET name = '$update_name', contact =' $update_contact', address = '$update_address'
    WHERE id = '$update_id' ") or die('query faileds');

   header('location:index.php?page=customer');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
</head>
<body>
    <?php include('navbar.php');?>

<section class="edit-customer-form">

    <?php
            if(isset($_GET['update'])){
                $update_id = $_GET['update'];
                $update_query = mysqli_query($conn, "SELECT * FROM `customer_list` WHERE id = '$update_id'") or die('query failed');
                if(mysqli_num_rows($update_query) > 0){
                    while ($fetch_update = mysqli_fetch_assoc($update_query)){
    ?>
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="card">
					<div class="card-header">
						    Customer Form
				  	</div>
                      <div class="card-body">
                      <input type="hidden" name="update_c_id" value="<?php echo $fetch_update['id'];?>">
                      <div class="form-group">
								<label class="control-label">Customer Name</label>
								<input type="text" class="form-control" name="update_name" required  
                                placeholder="Please Enter Name" value="<?php echo $fetch_update['name'];?>"> 
							</div>
							<div class="form-group">
								<label class="control-label">Contact</label>
								<input type="text" class="form-control" name="update_contact" 
                                placeholder="Please Enter Contact Number" value="<?php echo $fetch_update['contact'];?>">
							</div>
							<div class="form-group">
								<label class="control-label">Address</label>
                         
								<input type="text"  class="form-control" name="update_address" placeholder="Please Enter Address" value="<?php echo $fetch_update['address'];?>"></input>
							</div>
                      
                      </div>
                      		
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
                            <input type="submit" name="update_customer" value="update" class="btn">
                           <input type="reset" value="cancel" id="close-update" class="option-btn">
							</div>
						</div>
					</div>
          </div>
        </form>
    <?php
           }
        }
      }else{
         echo '<script>document.querySelector(".edit-customer-form").style.display = "none";</script>';
      }
    
    ?>

</section>
    
</body>
</html>