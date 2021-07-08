<?php
// STD702 s00009622 Natalia Iudina 08.06.2021
?>

<?php
$records = getCoursesRecords();
?>
   
    <h5 class="pb-3"><i class="fas fa-circle ui-text p-2 fs-6"></i>Active Courses</h5>
    <table class="table user-text table-bordered">
      <tr>
        <th style="width: 10px">#</th>
        <th>Course name</th>
        <th>Start date</th>
        <th>End date</th>
        <th>Action</th>
      </tr>
      <?php
	  $idx = 1;
	  foreach($records as $rec) {
	  	extract($rec);
	  ?>
      <tr>
        <td><?php echo $idx++; ?></td>
        <td><?php echo $corname; ?></a></td>
        <td><?php echo $corstart; ?></td>
        <td><?php echo $corend; ?></td>
        <td><a href="javascript:deleteCourse('<?php echo $corid ?>');">Delete<i class="fas fa-trash p-2"></i></a></td>
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
function deleteCourse(corid) {
	if(confirm('You are about to delete course.\n\nAre you sure you want to proceed ?')) {
		window.location.href = '<?php echo WEB_ROOT; ?>api/process.php?cmd=cordelete&corId='+corid;
	}
}

</script>
