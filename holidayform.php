<?php
// STD702 s00009622 Natalia Iudina 08.06.2021
?>

<div class="row">
<!-- Horizontal Form -->
  <!-- form start -->
  <!-- <form class="form-horizontal" method="post"> -->
 <h5 class="pb-2"><i class="fas fa-circle ui-text p-2 fs-6 "></i>Add Holiday</h5> 
  <form action="<?php echo WEB_ROOT; ?>api/process.php?cmd=holiday" method="post">
  <div class="form-group">
  <label for="hdate">Holiday Date</label>  
		<span id="sprytf_date">
          <input type="text" class="form-control input-sm" name="date" placeholder="yyyy-mm-dd" required>
		  <!-- <span class="textfieldRequiredMsg">Date is required.</span> -->
		</span>
        </div>
      

      <div class="form-group pt-3 pb-2">
      <label for="hdate">Holiday Reason</label>    
		<span id="sprytf_reason">
          <input type="text" class="form-control input-sm" name="reason" placeholder="Holiday reason" required>
		  <!-- <span class="textfieldMinCharsMsg">Reason must specify at least 8 characters.</span> -->
		</span>    
      </div>
    
    
      <button type="submit" class="btn w-100 py-2 my-4">Add Holiday<i class="fas fa-plus p-2 "></i></button>
    
  </form>
  </div>

<!-- /.box -->
<script>

</script>


