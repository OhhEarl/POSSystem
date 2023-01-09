

<?php include 'db_connect.php';




?>


<style>


	.container{
		height: 80vh;
		width: 100%;
	}
.col{
	background-color: white;
	margin-right: 8px;
	border-radius: 15px;
	box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
	height: 80px;
	padding-top: 15px;
	display: inline;

}


.row{
	margin-top: 15px;
	margin-left: -23px;
}
.col p{
	margin-top: -15px;
}
 

   body{
	font-family: 'Poppins', sans-serif;
	background-color: #e9e9f7;;
   }
   img{
	height: 45px;
	margin-left: -10px;
   }

 .paragContainer{
	width: 250px;
	margin-left: 50px;
	height: 100px;
	position: absolute;
	top: 0;
	margin-top: 30px;
   }

   .titleS{
	font-weight: 600;
	color: #066049;
   }


</style>
<div class="container">
  <div class="row">
    <div class="col">	
	<img src="assets\img\money-bag.gif" alt="">
	<div  class="paragContainer">
	<p class="titleS">Sales This Day</p>
					<p>₱<large><?php 
					$sales = $conn->query("SELECT SUM(total_amount) as amount FROM sales_list where date(date_updated)= '".date('Y-m-d')."'");
					echo $sales->num_rows > 0 ? number_format($sales->fetch_array()['amount'],2) : "0.00";

					 ?></large></p>
	</div>
    </div>	

    <div class="col">
	<img src="assets\img\checklist.gif" alt="">
	<div  class="paragContainer">
	<p class="titleS">Total Invoices</p>
					<p><large><?php 
					$select_products = mysqli_query($conn, "SELECT * FROM `sales_list`") or die('query failed');
					$number_of_products = mysqli_num_rows($select_products);
	   
	echo $number_of_products;
					 ?></large></p>
	</div>
    </div>

    <div class="col">
	<img src="assets\img\warehouse.gif" alt="">
	<div  class="paragContainer">
		<p class="titleS">Products Added</p>
					<p><large><?php 
					$select_products = mysqli_query($conn, "SELECT * FROM `product_list`") or die('query failed');
					$number_of_products = mysqli_num_rows($select_products);
   					
					echo $number_of_products;

					 ?></large></p>
	</div>
    </div>

	<div class="col">
	<img src="assets\img\save-money.gif" alt="">
	<div class="paragContainer">
		<p class="titleS">Total Sales</p>
					<p>₱<large><?php 
			
					$totalSales = $conn->query("SELECT SUM(total_amount) as amount FROM sales_list ");
					echo $totalSales->num_rows > 0 ? number_format($totalSales->fetch_array()['amount'],2) : "0.00";

					 ?></large></p>

	</div>
    </div>
  </div>
</div>





