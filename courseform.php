<?php
// STD702 s00009622 Natalia Iudina 12.07.2021
?>

  <div class="row">
  <form action="<?php echo WEB_ROOT; ?>api/process.php?cmd=course" class="py-2" method="post">
    <div class="col-md-12 form-group pt-1">
      <label for="fname">Course Name</label>
      <input type="text" class="form-control" id="cname" placeholder="Enter Course Name" name="cname">
    </div>

    <div class="row">
    <div class="col-md-6 form-group pt-3">
      <label for="sdate">Start Date</label>
      <input type="date" class="form-control" id="sdate"  name="sdate">
    </div>
    <div class="col-md-6 form-group pt-3">
      <label for="edate">End Date</label>
      <input type="date" class="form-control" id="edate" name="edate">
    </div>
    </div>

    <div class="form-group pt-3 pb-2">
    <label for="colorpicker">Select Course Color</label>
      <span class="d-flex "><input class="colorPicker" type='color' id='colorPicker' value="#FFC817"></span>
    </div>
    <div class="col-md-12">
		<button type="submit" class="btn add_new_course w-100 my-4 py-3"> Add Course<i class="fas fa-plus px-2 "></i> </button>
    </div>
  </form>
  </div>