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

$sql="select * from infra_vulns order by 'Plugin ID' desc";
$res=mysqli_query($connection,$sql);
?>
<div class="content">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Vulnerabilities</h4>
				   <button><a href="add_infrastructure.php">Add Data</a></button>
<<<<<<< Updated upstream
=======
				   <button><a href="ADD_infra_batch.php">Add Batch</a></button>
				   <?php } ?>
>>>>>>> Stashed changes
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">Status</th>
							   <th>Plugin ID</th>
							   <th>Vulnerability</th>
							   <th>Severity</th>
							   <th>Hostname</th>
						       <th>IP</th>
							   <th>Count</th>
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
							   <td><?php echo $row['plugin_id']?></td>
							   <td><?php echo $row['vulnerability']?></td>
							   <td><?php echo $row['severity']?></td>
							   <td><?php echo $row['hostname']?></td>
							   <td><?php echo $row['ip']?></td>
							   <td><?php echo $row['count']?></td>
							   <td><?php echo $row['date_found']?></td>
							   <td><?php echo $row['date_remediated']?></td>
							   <td>
								<?php
								echo "<span class='badge badge-edit'><a href='https://www.tenable.com/plugins/nessus/".$row['plugin_id']."'>Detail</a></span>";
<<<<<<< Updated upstream
								echo "<span class='badge badge-edit'><a href='edit_infrastructure.php?id=$row[id]'>Edit</a></span>";
								echo "<span class='badge badge-delete'><a href='delete_infrastructure.php?id=$row[id]'> Hapus </a></span>";
=======
								echo "<span class='badge badge-edit'><a href='EDIT_infrastructure.php?id=$row[id]'>Edit</a></span>";
								echo "<span class='badge badge-edit'><a href='STATUS_infra.php?id=$row[id]'>Status</a></span>";
								echo "<span class='badge badge-delete'><a href='DELETE_infrastructure.php?id=$row[id]' onClick=\"return confirm('Apakah anda yakin ingin menghapus data?');\"> Hapus </a></span>";
>>>>>>> Stashed changes
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
