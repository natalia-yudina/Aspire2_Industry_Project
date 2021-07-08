<?php
// Kerem Uzun 08.06.2021
?>

<?php
$records = getAvailabilityRecords();
?>


  <!-- /.box-header -->
 
    <table class="table ">
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
        <td><input type="checkbox" class="w-100"></td>
        <td><?php echo $wday; ?></a></td>
        <td><?php echo $cname; ?></td>
        <td><?php echo $stime; ?></td>
        <td><?php echo $etime; ?></td>
      
     
      </tr>
      <?php } ?>
    </table>
    <button type="button" class="btn w-25"> Update Days <i class="fas fa-sync-alt p-2"></i> </button>
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix">
    <?php
    // echo generateHolidayPagination();
    ?> 

<!-- /.box -->
<script language="javascript">

</script>
