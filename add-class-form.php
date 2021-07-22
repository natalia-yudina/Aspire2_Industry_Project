<form class="px-4">
<!-- NI 03-06-2021 end -->
<div class="col-md-12 form-group py-2">
    <label for="hcname">Who is Head Coach?</label>
    <select class="form-control form-select" id="hcname" required>
      <!-- NI 03-06-2021 begin -->
			<!-- <option>Jane Doe</option>
      <option>Jhone Doe</option> -->
			<option value="0">-Select-</option>
			<?php
			// NI 08-06-2021 begin
			// $query = $mysqli->query("SELECT id_user, last_name FROM users");
			$sql="SELECT id_user, last_name FROM users where id_role = '2'";
			$query = dbQuery($sql);
			// NI 08-06-2021 end
			while($row = mysqli_fetch_assoc($query)) {
			$selected = ($row['id_user'] == $myrow['last_name']) ? ' selected' : '';
			echo "<option ".$selected." value=".$row['id_user'].">".$row['last_name']."</option>";
			}
			?>
			<!-- NI 03-06-2021 end -->
    </select>
  </div>
  <div class="col-md-12 form-group pt-3">
    <label for="cname">Choose the Course</label>
    <select class="form-control form-select" id="cname" required>
      <!-- NI 03-06-2021 begin -->
            <!-- <option>Blue Fleet</option>
            <option>Green Fleet</option> -->
      			<option value="0">-Select-</option>
      			<?php
			// NI 08-06-2021 begin
			// $query = $mysqli->query("SELECT id_course, course_name FROM course");
			$sql="SELECT id_course, course_name FROM course";
			$query = dbQuery($sql);
			// NI 08-06-2021 end
      while($row = mysqli_fetch_assoc($query)) {
      $selected = ($row['id_course'] == $myrow['course_name']) ? ' selected' : '';
      echo "<option ".$selected." value=".$row['id_course'].">".$row['course_name']."</option>";
      }
      ?>
      <!-- NI 03-06-2021 end -->
    </select>
  </div>
  <div class="col-md-12 form-group pt-3">
    <label for="day">Choose a Day</label>
    <select class="form-select" id="day" required>
      <option>Monday</option>
      <option>Tuesday</option>
      <option>Wednesday</option>
      <option>Thursday</option>
      <option>Friday</option>
      <option>Saturday</option>
      <option>Sunday</option>
    </select>
  </div>

  <div class="row pb-2">
  <div class="col-sm-6 form-group pt-3">
      <label for="stime">Start</label>
      <input type="time" class="form-control" id="stime" name="stime" required>
    </div>
    <div class="col-sm-6 form-group pt-3">
      <label for="etime">End</label>
      <input type="time" class="form-control" id="etime" name="etime" required>
    </div>
    </div>

    <!-- NI 03-06-2021 begin -->
        <!-- <button type="submit" class="btn btn-dark mt-4 mb-5 "> Add Course </button> -->

        <div class="col-md-12">
        <button type="button" class="btn add_new_class my-4 py-3  w-100" onClick="window.location.reload();"> Add Class<i class="fas fa-plus px-2"></i></button>
        </div>

    <!-- NI 03-06-2021 end -->
  </form>