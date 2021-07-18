<?php
// STD702 s00009622 Natalia Iudina 16.07.2021
?>


<?php
    // NI 08-06-2021 begin
    // include $_SERVER['DOCUMENT_ROOT'] . "/Aspire2_Industry_Project/includes/database.php";
    require_once '../config.php';
    // NI 08-06-2021 end
    $all_events_string = $_POST['all_events_string'];
    // $prep_string = html_entity_decode($all_events_string);
    $dataJson = json_decode(str_replace ('\"','"', $all_events_string), true);
    // $dataJson=json_decode($prep_string, true);
    // $dataJson=json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $all_events_string), true );
    $separator = " ";
    $data_string = "";

    foreach ($dataJson as $event_value) {
      $separator = $separator . $separator;
    //   $data_string = $data_string + $separator . "(" . $event_value[0] . "," . $event_value[1] . "," . $event_value[2,0] . ")"
    //   $separator = ", ";
    //   $data_string = $data_string + $separator . "(" . $event_value[0] . "," . $event_value[1] . "," . $event_value[2,1] . ")"
    //   // $index = array_search('start',$event_value,true);
    //   // if ($index !== false) {
    //   //   $start_class = $val_arr[1];
    //   //   $end_class = $val_arr[2];
    //   //   unset($val_arr);
    //   // }
    }



    // $all_events     = ($_POST["all_events"]);
    // $id_user        = ($_POST["id_user"]);
    // $id_course      = ($_POST["id_course"]);
    // $shiftday       = ('2021-07-30');

    // $shiftday       = ($_POST["day"]);


    // $sql = "INSERT history_availability (id_class, id_user, shiftday) VALUES ('$id_class', '$id_user', '$shiftday')";
    // //dbQuery - function in database.php
    // dbQuery($sql);

    header('Content-type: application/json; charset=utf-8');

    $massiv_jasone['resultOK'] = $dataJson;
    $massiv_jasone['message']  = "OK";
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;

?>
