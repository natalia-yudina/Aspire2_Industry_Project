<?php
// STD702 s00009622 Natalia Iudina 16.07.2021
?>


<?php
    // NI 08-06-2021 begin
    // include $_SERVER['DOCUMENT_ROOT'] . "/Aspire2_Industry_Project/includes/database.php";
    require_once '../config.php';
    // NI 08-06-2021 end
    $dataJson=json_decode($_GET['all_events_string']);
    // $all_events     = ($_POST["all_events"]);
    // $id_user        = ($_POST["id_user"]);
    // $id_course      = ($_POST["id_course"]);
    // $shiftday       = ('2021-07-30');

    // $shiftday       = ($_POST["day"]);


    // $sql = "INSERT history_availability (id_course, id_user, shiftday) VALUES ('$id_course', '$id_user', '$shiftday')";
    // //dbQuery - function in database.php
    // dbQuery($sql);

    header('Content-type: application/json; charset=utf-8');

    $massiv_jasone['resultOK'] = true;
    $massiv_jasone['message']  = "OK";
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;

?>
