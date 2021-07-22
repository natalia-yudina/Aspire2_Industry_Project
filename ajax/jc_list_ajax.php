<?php
  require_once '../config.php';

if($_POST['id_class'])
{
	$id_class  = $_POST["id_class"];
	$jc_1      = $_POST["jc_1"];
	$jc_2      = $_POST["jc_2"];
	$jc_3      = $_POST["jc_3"];
	$jc_4      = $_POST["jc_4"];

    // modal window
        echo "

        <div class='modal-content'>
          <!-- NI 15-07-2021 begin -->

               <!-- Modal Header -->
               <div class='modal-header'>
                 <h4 class='modal-title' style='color:black'>
                   <p></p>
                   <p id='hc'></p>
                 </h4>
                 <!-- <button type='button' class='close' data-dismiss='modal' (click) = 'hide()'>&times;</button> -->
               </div>

               <!-- Modal body -->
               <!-- <input type='hidden' name='id_class' id='id_class' value=''> -->
                <input type='hidden' name='id_event_text' id='id_event_text' value=''>
             <div class='modal-body' style='color:black'>
                 <p></p>

                 <form class='user_action_form'>

                     <div class='form-group row'>
                         <label for='s1' style='color:black' class='col-md-4 col-form-label text-md-right'>List of coaches:</label>
                         <div class='col-md-6'>

                  ";
                  // get available coaches
                  $query = "SELECT a.id_user, u.first_name, u.last_name FROM availability a JOIN users u ON a.id_user = u.id_user WHERE a.id_class='$id_class'";
                  $list_result = dbQuery($query);
                  echo "
                 <select class='form-select' name='s1' id='s1'>
                     <option value='0'> - Select - </option>";

                        while($row_user = dbFetchAssoc($list_result)) {
                          extract($row_user);
                          $selected = ($id_user == $jc_1) ? ' selected' : '';
                          echo "<option ".$selected." value=" . $id_user .">" . $first_name . " " . $last_name . "</option>";
                        }
                  echo "
                 </select>
                 <select class='form-select' name='s2' id='s2'>
                     <option value='0'> - Select - </option>";

                        mysqli_data_seek($list_result,0);
                        while($row_user = dbFetchAssoc($list_result)) {
                          extract($row_user);
                            $selected = ($id_user == $jc_2) ? ' selected' : '';
                          echo "<option ".$selected." value=" . $id_user .">" . $first_name . " " . $last_name . "</option>";
                        }
                  echo "
                 </select>
                 <select class='form-select' name='s3' id='s3'>
                     <option value='0'> - Select - </option>";

                        mysqli_data_seek($list_result,0);
                        while($row_user = dbFetchAssoc($list_result)) {
                          extract($row_user);
                            $selected = ($id_user == $jc_3) ? ' selected' : '';
                          echo "<option ".$selected." value=" . $id_user .">" . $first_name . " " . $last_name . "</option>";
                        }
                  echo "
                 </select>
                 <select class='form-select' name='s4' id='s4'>
                     <option value='0'> - Select - </option>";

                        mysqli_data_seek($list_result,0);
                        while($row_user = dbFetchAssoc($list_result)) {
                          extract($row_user);
                            $selected = ($id_user == $jc_4) ? ' selected' : '';
                          echo "<option ".$selected." value=" . $id_user .">" . $first_name . " " . $last_name . "</option>";
                        }
                  echo "
                 </select>
             </div>
         </div>
        </form>
               </div>

               <!-- Modal footer -->
               <div class='modal-footer'>
                  <button type='button' class='btn btn-success ev_update' data-id='$id_class' data-action='update'>Update</button>
                  <button type='button' class='btn btn-success' data-dismiss='modal'>Close</button>
               </div>

             </div>
        ";
}

?>
