
<?php
// Kerem Uzun 08.06.2021
?>

<?php
$records = getAvailabilityRecords();
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title pb-2">Availability List</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered">
      <tr>
        <th style="width: 10px">Select</th>
        <th>Day</th>
        <th>Course Name</th>
        <th>Start Time</th>
        <th>End Time</th>
        
      </tr>
      <?php
	  $idx = 1;
	  foreach($records as $rec) {
	  	extract($rec);
	  ?>
      <tr>
        <td><input type="checkbox"></td>
        <td><?php echo $wday; ?></a></td>
        <td><?php echo $cname; ?></td>
        <td><?php echo $stime; ?></td>
        <td><?php echo $etime; ?></td>


      </tr>
      <?php } ?>
    </table>
    <button type="button" class="btn btn-dark mt-4 mb-5 add_new_class"> Update Your Availability </button>
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix">
    <?php
    // echo generateHolidayPagination();
    ?> </div>
</div>
<!-- /.box -->
<script language="javascript">


</script>
