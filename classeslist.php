<?php
// STD702 s00009622 Natalia Iudina 08.06.2021
?>

<?php
$records = getClassesRecords();
?>
   
    <h5 class="pb-3"><i class="fas fa-circle ui-text p-2 fs-6"></i>Active Classes</h5>
    <table class="table user-text table-bordered">
      <tr>
        <th style="width: 10px">#</th>
        <th>Head Coach</th>
        <th>Course</th>
        <th>Day</th>
        <th>Start</th>
        <th>End</th>
        <th>Action</th>
      </tr>
      <?php
	  $idx = 1;
	  foreach($records as $rec) {
	  	extract($rec);
	  ?>
      <tr>
        <td><?php echo $idx++; ?></td>
        <td><?php echo $ccoach; ?></a></td>
        <td><?php echo $courid; ?></a></td>
        <td><?php echo $cday; ?></a></td>
        <td><?php echo $cstart; ?></a></td>
        <td><?php echo $cend; ?></td>
        <td><a href="javascript:deleteClass('<?php echo $cid ?>');">Delete<i class="fas fa-trash p-2"></i></a></td>
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
function deleteClass(cid) {
	if(confirm('You are about to delete class.\n\nAre you sure you want to proceed ?')) {
		window.location.href = '<?php echo WEB_ROOT; ?>api/process.php?cmd=cdelete&cId='+cid;
	}
}

</script>
