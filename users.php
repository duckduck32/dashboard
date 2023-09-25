<?php
require('sidebar.php');
isAdmin();

$sql="select * from admin_users order by 'id' desc";
$res=mysqli_query($connection,$sql);

?>
<div class="content">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">User Management</h4>
				   <button><a href="add_users.php">Add Users</a></button>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">ID</th>
							   <th>Username</th>
							   <th>Privilege</th>
							   <th>Team</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $row['id']?></td>
							   <td><?php echo $row['username']?></td>
							   <td><?php echo $row['role']?></td>
							   <td><?php echo $row['team']?></td>
							   <td>
								<?php
								echo "<span class='badge badge-edit'><a href='changePrivileges.php?id=$row[id]'>Change Privileges</a></span>";
								echo "<span class='badge badge-delete'><a href='delete_users.php?id=$row[id]' onClick=\"return confirm('Apakah anda yakin ingin menghapus data?');\"> Hapus </a></span>";
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