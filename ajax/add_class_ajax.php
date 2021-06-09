<?php
// STD702 s00009622 Natalia Iudina 03.06.2021
?>


<?php
    // NI 08-06-2021 begin
    // include $_SERVER['DOCUMENT_ROOT'] . "/Aspire2_Industry_Project/includes/database.php";
    require_once '../config.php';
    // NI 08-06-2021 end

    $id_user        = ($_POST["id_user"]);
    $id_course      = ($_POST["id_course"]);
    $day            = ($_POST["day"]);
    $start_time     = ($_POST["start_time"]);
    $end_time       = ($_POST["end_time"]);

    // NI 08-06-2021 begin
    // $query = mysqli_query($mysqli, "INSERT class (id_course, id_user, weekday, start_time, end_time) VALUES ('$id_course', '$id_user', '$day', '$start_time', '$end_time')");
    $sql = "INSERT class (id_course, id_user, weekday, start_time, end_time) VALUES ('$id_course', '$id_user', '$day', '$start_time', '$end_time')";
    //dbQuery - function in database.php
    dbQuery($sql);
    header('Content-type: application/json; charset=utf-8');
    // NI 08-06-2021 end
    $massiv_jasone['resultOK'] = true;
    $massiv_jasone['message']  = "OK";
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;

?>
