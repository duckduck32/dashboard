<?php
require('sidebar.php');
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($connection,$_GET['type']);
	if($type=='delete'){
		$id=get_safe_value($connection,$_GET['id']);
		$delete_sql="delete from tbl_member where id='$id'";
		mysqli_query($connection,$delete_sql);
	}
}
$sql="select * from failed_scans order by 'id' desc";
$res=mysqli_query($connection,$sql);
?>
<div class="content">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Assets Scanned</h4>
				   <?php if($_SESSION['ADMIN_TEAM']=="sec"){?>
				   <button><a href="add_infrastructure.php">Add Data</a></button>
				   <button><a href="ADD_asset_batch.php">Add Batch</a></button>
				   <?php } ?>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th>ID</th>
							   <th>Hostname</th>
						       <th>IP</th>
							   <th>Domain</th>
							   <th>Status</th>
							   <th>Detail</th>
							   <th>Assigned To</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td><?php echo $row['id']; ?></td>
							   <td><?php echo $row['domain']; ?></td>
							   <td><?php echo $row['ip']; ?></td>
							   <td><?php echo $row['domain']; ?></td>
							   <td><?php echo $row['status_chart']; ?></td>
							   <td><?php echo $row['status_table']; ?></td>
							   <td><?php echo $row['assigned_to']; ?>
							   <td>
								<?php
								echo "<span class='badge badge-edit'><a href='EDIT_assets.php?id=$row[id]'>Edit</a></span>";
								echo "<span class='badge badge-edit'><a href='STATUS_assets.php?id=$row[id]'>Status</a></span>";
								echo "<span class='badge badge-delete'><a href='DELETE_assets.php?id=$row[id]' onClick=\"return confirm('Apakah anda yakin ingin menghapus data?');\"> Hapus </a></span>";
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