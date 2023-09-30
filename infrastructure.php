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

$sql="select * from infra_vulns order by 'ID' desc";
$res=mysqli_query($connection,$sql);

$columns = array('date_found');

$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

if ($result = $connection->query('SELECT * FROM infra_vulns ORDER BY ' .  $column . ' ' . $sort_order)) {
	$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
	$add_class = '';

?>
<div class="content">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Infrastructure Vulnerabilities</h4>
				   <?php if($_SESSION['ADMIN_TEAM']=="sec"){?>
				   <button><a href="add_infrastructure.php">Add Data</a></button>
				   <?php } ?>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th>ID</th>
							   <th>Status</th>
							   <th>Vulnerability</th>
							   <th>Severity</th>
							   <th>Hostname</th>
						       <th>IP</th>
							   <th>Count</th>
							   <th><a href="infrastructure.php?column=name&order=<?php echo $asc_or_desc; ?>&date_sort=<?php echo $asc_or_desc; ?>">Date Found<i class="fas fa-sort<?php echo $column == 'date_found' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							   <th>Date Remediated</th>
							   <th>Assigned To</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=$result->fetch_assoc()):?>
							<tr>
							   <td><?php echo $column == 'id' ? $add_class : ''; ?><?php echo $row['id']; ?></td>
							   <td><?php echo $column == 'status' ? $add_class : ''; ?><?php echo $row['status']; ?></td>
							   <td><?php echo $column == 'vulnerability' ? $add_class : ''; ?><?php echo $row['vulnerability']; ?></td>
							   <td><?php echo $column == 'severity' ? $add_class : ''; ?><?php echo $row['severity']; ?></td>
							   <td><?php echo $column == 'hostname' ? $add_class : ''; ?><?php echo $row['hostname']; ?></td>
							   <td><?php echo $column == 'ip' ? $add_class : ''; ?><?php echo $row['ip']; ?>
							   <td><?php echo $column == 'count' ? $add_class : ''; ?><?php echo $row['count']; ?></td>
							   <td><?php echo $column == 'date_found' ? $add_class : ''; ?><?php echo $row['date_found']; ?></td>
							   <td><?php echo $column == 'date_remediated' ? $add_class : ''; ?><?php echo $row['date_remediated']; ?></td>
							   <td><?php echo $column == 'assigned_to' ? $add_class : ''; ?><?php echo $row['assigned_to']; ?></td>
							   <td>
								<?php
								echo "<span class='badge badge-edit'><a href='https://www.tenable.com/plugins/nessus/".$row['plugin_id']."'>Detail</a></span>";
								echo "<span class='badge badge-edit'><a href='edit_infrastructure.php?id=$row[id]'>Edit</a></span>";
								echo "<span class='badge badge-edit'><a href='STATUS_infra.php?id=$row[id]'>Status</a></span>";
								echo "<span class='badge badge-delete'><a href='delete_infrastructure.php?id=$row[id]' onClick=\"return confirm('Apakah anda yakin ingin menghapus data?');\"> Hapus </a></span>";
								?>
							   </td>
							</tr>
							<?php endwhile; ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
$result->free();
						}
						?>