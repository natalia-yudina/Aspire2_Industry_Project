
<?php
$records = getCoachesList();
?>
   
    <h5 class="pt-3 pb-3"><i class="fas fa-circle ui-text p-2 fs-6"></i>Registered Coaches</h5>
    <table class="table user-text table-bordered">
      <tr>
        <th style="width: 10px">#</th>
        <th>Role</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone Number</th>
        <th>Action</th>
      </tr>
      <?php
	  $idx = 1;
	  foreach($records as $rec) {
	  	extract($rec);
	  ?>
      <tr>
        <td><?php echo $idx++; ?></td>
        <td><?php if ($role == '2') {echo '<i class="fas fa-anchor"></i> Head Coach';} else {echo '<i class="fas fa-wind"></i> Jr. Coach';} ?></a></td>
        <td><?php echo $fname; ?></a></td>
        <td><?php echo $lname; ?></td>
        <td><?php echo $pnumber; ?></td>
        <td><a href="javascript:deleteUser('<?php echo $uid ?>');">Delete<i class="fas fa-trash p-2"></i></a></td>
      </tr>
      <?php } ?>
    </table>
  
  <!-- /.box-body -->
  <div class="box-footer clearfix">
    <?php
    // echo generateHolidayPagination();
    ?> </div>

<!-- /.box -->
<script language="javascript">
function deleteUser(uid) {
	if(confirm('User account will be deleted. Do you want to continue ?')) {
		window.location.href = '<?php echo WEB_ROOT; ?>api/process.php?cmd=udelete&uid='+uid;
	}
}

</script>
