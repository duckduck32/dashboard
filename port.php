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

$sql="select * from open_ports order by 'id' desc";
$res=mysqli_query($connection,$sql);
?>
<div class="content">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Port Vulnerabilities</h4>
				   <?php if($_SESSION['ADMIN_TEAM']=="sec"){?>
				   <button><a href="add_port.php">Add Data</a></button>
				   <?php } ?>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">Status</th>
							   <th>Open Port</th>
							   <th>Priority</th>
							   <th>Hostname</th>
						       <th>IP</th>
							   <th>Date Found</th>
							   <th>Date Remediated</th>
							   <th>Assigned To</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $row['status']?></td>
							   <td><?php echo $row['open_port']?></td>
							   <td><?php echo $row['priority']?></td>
							   <td><?php echo $row['hostname']?></td>
							   <td><?php echo $row['ip']?></td>
							   <td><?php echo $row['date_found']?></td>
							   <td><?php echo $row['date_remediated']?></td>
							   <td><?php echo $row['assigned_to']?></td>
							   <td>
								<?php
								echo "<span class='badge badge-edit'><a href='edit_port.php?id=$row[id]'>Edit</a></span>";
								echo "<span class='badge badge-delete'><a href='delete_port.php?id=$row[id]' onClick=\"return confirm('Apakah anda yakin ingin menghapus data?');\"> Hapus </a></span>";
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