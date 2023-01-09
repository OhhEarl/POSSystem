<?

@include 'db_connect.php';
session_start();

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['login_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:administrator.php');

      }elseif($row['login_type'] == 'manager'){

         $_SESSION['management_name'] = $row['name'];
         $_SESSION['management_id'] = $row['id'];
         header('location:index.php?page=home');

      }elseif($row['login_type'] == 'cashier'){

		$_SESSION['cashier_name'] = $row['name'];
		$_SESSION['cashier_id'] = $row['id'];
		header('location:cashier.php');

	 }

   }else{
    echo 'Incorrect Email or Password';
   }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="POST">
    <input type="text" name="username" placeholder="username" required class="box">
    <input type="password" name="password" placeholder="password" required class="box">
    <input type="submit" name="submit" value="Login" class="btn">
</form>
    
</body>
</html>