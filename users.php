<?php
require('sidebar.php');
isAdmin();
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($connection,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($connection,$_GET['operation']);
		$id=get_safe_value($connection,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update admin_users set status='$status' where id='$id'";
		mysqli_query($connection,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($connection,$_GET['id']);
		$delete_sql="delete from admin_users where id='$id'";
		mysqli_query($connection,$delete_sql);
	}
}

$sql="select * from admin_users where role=1 order by id desc";
$res=mysqli_query($connection,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
<<<<<<< Updated upstream
				   <h4 class="box-title">VENDOR MANAGEMENT </h4>
				   <h4 class="box-link"><a href="manage_vendor_management.php">ADD VENDOR</a> </h4>
=======
				   <h4 class="box-title">User Management</h4>
				   <?php if($_SESSION['ADMIN_TEAM']=="sec"){?>
				   <button><a href="add_users.php">Add Users</a></button>
				   <?php } ?>
>>>>>>> Stashed changes
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th width="2%">ID</th>
							   <th width="20%">Username</th>
							   <th width="20%">Password</th>
							   <th width="26%"></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['username']?></td>
							   <td><?php echo $row['password']?></td>
							  
							   <td>
								<?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_vendor_management.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
