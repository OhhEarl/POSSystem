<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Jird Store Sales and Inventory System</title>
  <link rel="icon" href="assets\img\R.jpg" type="image/icon type">
 	

<?php

   
include 'header.php';
include 'db_connect.php';

	session_start();
  if(!isset($_SESSION['login_type']))
    header('location:login.php');

 
 // include('./auth.php'); 
 
 ?>

</head>
<style>
	body{
        background: #80808045;
  }

</style>

<body>
	<?php include 'navbar.php' ;
		include 'topbar.php'
	?>
  <style>

	.container-fluid{
		margin-left: 50px;
	}
   .card{
	margin-left: 20px;
	width: 700px;
	box-shadow:0 .5rem 1rem rgba(0,0,0,.2);
   }

   .row{
	text-align: center;
   }

   .alert{
	width: 300px;
	display: inline-block;
	background: #2FB6B7;
	background: -webkit-linear-gradient(top left, #2FB6B7, #7BD0A3);
	background: -moz-linear-gradient(top left, #2FB6B7, #7BD0A3);
	background: linear-gradient(to bottom right, #2FB6B7, #7BD0A3);;
	margin-bottom: 50px;
	box-shadow:0 .5rem 1rem rgba(0,0,0,.2);

   }

   .alert p{
	font-size: 25px;
   }
   .text-center{
		padding: 10px;
		background-color: aqua;
		font-size: 25px;
		border-radius: 10px;
		background: #2FB6B7;
		background: -webkit-linear-gradient(top left, #2FB6B7, #7BD0A3);
		background: -moz-linear-gradient(top left, #2FB6B7, #7BD0A3);
		background: linear-gradient(to bottom right, #2FB6B7, #7BD0A3);;
		box-shadow:0 .5rem 1rem rgba(0,0,0,.2);
		border: 1px solid #ccc;	
   }

   .card-body{
	font-size: 25px;
   }


</style>

<div class="container-fluid">

	<div>
		<div >
			
		</div>
	</div>

	<div class="row mt-3 ml-3 mr-3">
			<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
				<?php echo "Welcome Back"."<span> - </span>".$_SESSION['admin_name']."!" ;
					echo '<br>';
					$date = date('y/m/d');
					echo "($date)";
				?>				
				</div>
				<hr>

			<div>
			<div class="alert alert-success bg-secondary text-light">
					<p><b><large>Total Sales Today</large></b></p>
				<hr>
					<p class="text-center"><b>₱<large><?php 
					
          $sales = mysqli_query($conn, ("SELECT SUM(total_amount) as amount FROM sales_list where date(date_updated)= '".date('Y-m-d')."'")) or die('query failed');
          
					
          
          echo $sales->num_rows > 0 ? number_format($sales->fetch_array()['amount'],2) : "0.00";

					 ?></large></b></p>
				</div>

   
				<div class="alert alert-success bg-secondary text-light">
					<p><b><large>Total Sales</large></b></p>
					<hr>
					<p class="text-center"><b>₱<large><?php 
			
					$totalSales = $conn->query("SELECT SUM(total_amount) as amount FROM sales_list ");
					echo $totalSales->num_rows > 0 ? number_format($totalSales->fetch_array()['amount'],2) : "0.00";

					 ?></large></b></p>
				</div>
			</div>	
				
			</div>
			
		</div>
		</div>
	</div>

</div>
<script>
	
</script> 

</body>
</html>