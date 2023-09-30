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

$sql="select * from failed_scans order by 'ID' desc";
$res=mysqli_query($connection,$sql);

$columns = array('id','status','vulnerability','severity','hostname','IP','count','date_found','date_remediated');

$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

if ($result = $connection->query('SELECT * FROM failed_scans ORDER BY ' .  $column . ' ' . $sort_order)) {
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
							   <th><a href="failed_scans.php?column=name&order=<?php echo $asc_or_desc; ?>">ID<i class="fas fa-sort<?php echo $column == 'name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							   <th><a href="failed_scans.php?column=name&order<?php echo $asc_or_desc; ?>">Hostname<i class="fas fa-sort<?php echo $column == 'name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
						       <th><a href="failed_scans.php?column=name&order<?php echo $asc_or_desc; ?>">IP<i class="fas fa-sort<?php echo $column == 'name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							   <th><a href="failed_scans.php?column=name&order<?php echo $asc_or_desc; ?>">Domain<i class="fas fa-sort<?php echo $column == 'name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							   <th><a href="failed_scans.php?column=name&order<?php echo $asc_or_desc; ?>">Status<i class="fas fa-sort<?php echo $column == 'name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							   <th><a href="failed_scans.php?column=name&order<?php echo $asc_or_desc; ?>">Assigned To<i class="fas fa-sort<?php echo $column == 'name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=$result->fetch_assoc()):?>
							<tr>
							   <td><?php echo $column == 'id' ? $add_class : ''; ?><?php echo $row['id']; ?></td>
							   <td><?php echo $column == 'Hostname' ? $add_class : ''; ?><?php echo $row['hostname']; ?></td>
							   <td><?php echo $column == 'IP' ? $add_class : ''; ?><?php echo $row['ip']; ?></td>
							   <td><?php echo $column == 'Domain' ? $add_class : ''; ?><?php echo $row['domain']; ?></td>
							   <td><?php echo $column == 'Status' ? $add_class : ''; ?><?php echo $row['status_table']; ?></td>
							   <td><?php echo $column == 'Assigned To' ? $add_class : ''; ?><?php echo $row['assigned_to']; ?>
							   <td>
								<?php
								echo "<span class='badge badge-edit'><a href='#?id=$row[id]'>Status</a></span>";
								echo "<span class='badge badge-delete'><a href='#?id=$row[id]' onClick=\"return confirm('Apakah anda yakin ingin menghapus data?');\"> Hapus </a></span>";
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