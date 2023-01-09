<?php 
?>
<style>

.card{
	width: 968px;
	border-radius: 10px;
	box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
	}
	.card-header{
		width: 966px;
		margin-left: -15px;
	background-color:  #066049;
	color: white;
	}

	.container-fluid{
		margin-left: -7px;
		width: 968px;

}

table{
	margin-top: 60px;
}
.float-right{
	position: absolute;
	left: 35px;
	z-index: 1000;
	top: 105px;
}

.form-control{
	width: 440px;
}


</style>
<div class="container-fluid">
	
	<div class="row">
		
	</div>
	<br>
	<div class="row">
		<div class="card col-lg-12">
		<div class="card-header">
						<h4><b>Users</b></h4>
					</div>
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>

					<th class="text-center">Name</th>
					<th class="text-center">Username</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody class="text-center">
				<?php
 					include 'db_connect.php';
 					$users = $conn->query("SELECT * FROM users WHERE login_type = 'cashier'");
 					if($row= $users->fetch_assoc()):
				 ?>
				 <tr>
				 	<td>
				 		<?php echo $row['name'] ?>
				 	</td>

					 <td>
				 		<?php  echo $row['username']?>
				 	</td>
				 	<td>
				 		<center>
								<div class="btn-group">
								  <button type="button" class="btn btn-primary">Action</button>
								  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item edit_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Edit</a>
								    <div class="dropdown-divider"></div>
								    <a class="dropdown-item delete_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a>
								  </div>
								</div>
								</center>
				 	</td>
				 </tr>
				<?php endif; ?>
			</tbody>
		</table>
			</div>
		</div>
	</div>

</div>
<script>
	
$('#new_user').click(function(){
	uni_modal('New User','manage_user.php')
})
$('.edit_user').click(function(){
	uni_modal('Edit User','manage_userCashier.php?id='+$(this).attr('data-id'))
})
$('.delete_user').click(function(){
		_conf("Are you sure to delete this user?","delete_user",[$(this).attr('data-id')])
	})
	function delete_user($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_user',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>

