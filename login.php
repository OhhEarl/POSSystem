<?php

include 'db_connect.php';
include 'header.php';
session_start();

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = mysqli_real_escape_string($conn, ($_POST['password']));

   $users = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username' && password = '$pass'") or die('query failed');

   if(mysqli_num_rows($users) > 0){

      $row = mysqli_fetch_assoc($users);

      	if($row['login_type'] == 'admin'){
		$_SESSION['login_type'] = $row['login_type'];
         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:index.php?page=home');

      }elseif($row['login_type'] == 'manager'){

         $_SESSION['management_name'] = $row['name'];
		 $_SESSION['management_username'] = $row['username'];
         $_SESSION['management_id'] = $row['id'];
         header('location:indexManager.php?page=home');

      }elseif($row['login_type'] == 'cashier'){

		$_SESSION['cashier_name'] = $row['name'];
		$_SESSION['cashier_id'] = $row['id'];
		header('location:indexCashier.php?page=home');

	


	 }

   }else{
    echo 'Incorrect Email or Password';
   }

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <title>Jird Store Sales and Inventory System</title>
 	


</head>
<style>

	body{
		max-height: 100%;
	}

	.form{
		width: 100%;
		height: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
		
	}

	form{
		background-color: #066049;
		padding: 40px 10px;
		text-align: center;
		border-radius: 10px;
		box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.2);
		width: 420px;
		font-family: 'Poppins', sans-serif;;
	}

	form input{
		display: block;	
		margin: 10px auto;
		padding: 10px;
		border: none;
		border-radius: 5px;
		font-size: 20px;
		font-family: 'Poppins', sans-serif;
	}
	form input:focus{
		outline: none;
	}

	h3{
		color: #F87706;
	}
	.btn{
		background-color: #D86908;
		width: 40%;
		padding: 5px;
		font-size: 20px;
		font-family: sans-serif;
		color: white;
	}

	img{
		margin-left: 70px;
		margin-top: -50px;
	}


</style>

<body>

<div class="container text-center d-inline">
  <div class="row">
    <div class="col-6">
      <img src="assets\img\95601-finance.gif" alt="image">
    </div>
    <div class="col-6">
		<div class="form">
	<form action="" method="POST">
		<h3>SIGN IN NOW</h3>
		<input type="username" name="username" placeholder="username" required class="box">
		<input type="password" name="password" placeholder="password" required class="box">
		<input type="submit" name="submit" value="Login" class="btn">
	</form>
		</div>
		
    </div>
  </div>
</div>






</body>

</html>