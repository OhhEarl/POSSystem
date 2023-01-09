
<style>
	#sidebars{
		scale: 99%;
		margin-top: -45px;
		left: 7px;
		border-radius: 20px 20px 20px 20px;
		width: 230px;
		position: fixed;
		height: 97vh ;
		z-index: 1000;
		background-color: #066049;
		height: 100;
		
	}
	h3{
		color: white;
		margin-left: 13%;
		margin-top: 15px;
		font-family: Arial, Helvetica, sans-serif;
		font-weight: 700;
	}
.title{
	border-bottom: 2px solid white;

}
	a{
		display: block;
		color: white;
		margin-left: 20px;
		padding: 12px;
		font-family: 'Poppins', sans-serif;
		font-weight: 300;
		width: 170px;
	}
	a:hover{
		background-color: #f3f3fd;
		width: 180px;
		border-radius: 8px;
		color: #066049;
		
	}
	.icon-field{
		margin-right: 15px;
	}
.items{
	margin-top: 7px;
}


</style>
<nav id="sidebars" class='mx-lt-4' >
	
<div class="lists">
			<div class="title">
				<h3 >Navigation</h3>
			</div>
		
		<div class="items">
		<a href="index.php?page=home" class="nav-home"><span class='icon-field'><i class="fa fa-home"></i></span>Home</a>
				<a href="index.php?page=inventory" class=" nav-inventory"><span class='icon-field'><i class="fa fa-list"></i></span>Inventory</a>
				<a href="index.php?page=sales" class="nav-sales"><span class='icon-field'><i class="fa fa-coins"></i></span>Sales</a>
				<a href="index.php?page=receiving" class=" nav-receiving nav-manage_receiving"><span class='icon-field'><i class="fa fa-file-alt"></i></span> Receiving</a>
				<a href="index.php?page=categories" class=" nav-categories"><span class='icon-field'><i class="fa fa-list"></i></span>Category List</a>
				<a href="index.php?page=product" class=" nav-product"><span class='icon-field'><i class="fa fa-boxes"></i></span>Product List</a>
				<a href="index.php?page=supplier" class=" nav-supplier"><span class='icon-field'><i class="fa fa-truck-loading"></i></span>Supplier List</a>
				<a href="index.php?page=customer" class="nav-customer"><span class='icon-field'><i class="fa fa-user-friends"></i></span>Customer List</a>
				<a href="index.php?page=users" class=" nav-users"><span class='icon-field'><i class="fa fa-users"></i></span>Users</a>
				<a href="logout.php" class=""><span class='icon-field'><i class="fa fa-log-out"></i></span> Logout</a>
		

		</div>
				
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
<?php  if($_SESSION['login_type'] == 'admin'): ?>
	<style>
		.nav-sales, .nav-supplier{
			display: none!important;
		}
	</style>
<?php endif ?>
