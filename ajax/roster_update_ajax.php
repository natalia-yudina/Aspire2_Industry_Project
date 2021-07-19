<?php
// STD702 s00009622 Natalia Iudina 16.07.2021
?>


<?php

    require_once '../config.php';
    // string json
    $all_events_string = $_POST['all_events_string'];
    // array of events with coaches
    $dataJson = json_decode(str_replace ('\"','"', $all_events_string), true);

    $separator = "";

    foreach($dataJson as $event => $massiv){
      foreach($massiv['jc_list']  as  $key => $value){

      $date_event = date("Y-m-d", strtotime($massiv['start']));
      $data_string = $data_string . $separator . "(" . $massiv['ev_id_class'] . ", " . $value . ", '" . $date_event . "')";
      $separator = ", ";

      }
    }

    $sql = "INSERT INTO history_availability (id_class, id_user, shift_date) VALUES " . $data_string;
    //dbQuery - function in database.php
    dbQuery($sql);

    header('Content-type: application/json; charset=utf-8');

    $massiv_jasone['resultOK'] = true;
    $massiv_jasone['message']  = "OK";
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;

?>
