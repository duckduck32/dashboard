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

$sql="select * from app_vulns order by 'id' desc";
$res=mysqli_query($connection,$sql);
?>
<div class="content">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
<<<<<<< Updated upstream
				   <h4 class="box-title">Vulnerabilities</h4>
				   <button><a href="#!">Add Data</a></button>
=======
				   <h4 class="box-title">Application Vulnerabilities</h4>
				   <?php if($_SESSION['ADMIN_TEAM']=="sec"){?>
				   <button><a href="add_application.php">Add Data</a></button>
				   <button><a href="ADD_app_batch.php">Add Batch</a></button>
				   <?php } ?>
>>>>>>> Stashed changes
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">Status</th>
							   <th>Vulnerability</th>
							   <th>Severity</th>
<<<<<<< Updated upstream
							   <th>Hostname</th>
=======
							   <th>Domain</th>
							   <th>Path</th>
>>>>>>> Stashed changes
							   <th>Date Found</th>
							   <th>Date Remediated</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $row['status']?></td>
							   <td><?php echo $row['vulnerability']?></td>
							   <td><?php echo $row['severity']?></td>
<<<<<<< Updated upstream
=======
							   <td><?php echo $row['domain']?></td>
							   <td><?php echo $row['path']?></td>
>>>>>>> Stashed changes
							   <td><?php echo $row['date_found']?></td>
							   <td><?php echo $row['date_remediated']?></td>
							   <td>
								<?php
<<<<<<< Updated upstream
								echo "<span class='badge badge-edit'><a href='#!'>Edit</a></span>";
								echo "<span class='badge badge-delete'><a href='#!'> Hapus </a></span>";
=======
								echo "<span class='badge badge-edit'><a href='edit_application.php?id=$row[id]'>Edit</a></span>";
								echo "<span class='badge badge-edit'><a href='STATUS_application.php?id=$row[id]'>Status</a></span>";
								echo "<span class='badge badge-delete'><a href='delete_application.php?id=$row[id]' onClick=\"return confirm('Apakah anda yakin ingin menghapus data?');\"> Hapus </a></span>";
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