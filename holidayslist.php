<?php
// STD702 s00009622 Natalia Iudina 08.06.2021
?>

<?php
$records = getHolidayRecords();
?>
    </hr>
    <h5 class="mb-2">Active Holidays</h5>
    <table class="table table-bordered">
      <tr>
        <th style="width: 10px">#</th>
        <th>Date</th>
        <th>Reason</th>
        <th>Action</th>
      </tr>
      <?php
	  $idx = 1;
	  foreach($records as $rec) {
	  	extract($rec);
	  ?>
      <tr>
        <td><?php echo $idx++; ?></td>
        <td><?php echo $hdate; ?></a></td>
        <td><?php echo $hreason; ?></td>
        <td><a href="javascript:deleteHoliday('<?php echo $hid ?>');">Delete<i class="fas fa-trash p-2"></i></a></td>
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
function deleteHoliday(hid) {
	if(confirm('Deleting holiday will allows user to book that date.\n\nAre you sure you want to proceed ?')) {
		window.location.href = '<?php echo WEB_ROOT; ?>api/process.php?cmd=hdelete&hId='+hid;
	}
}

</script>
