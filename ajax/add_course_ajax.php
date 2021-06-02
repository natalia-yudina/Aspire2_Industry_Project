<?php
// STD702 s00009622 Natalia Iudina 02.06.2021
?>


<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/Aspire2_Industry_Project/includes/database.php";

    $course_name  = ($_POST["course_name"]);
    $start_date   = ($_POST["start_date"]);
    $end_date     = ($_POST["end_date"]);

    $query = mysqli_query($mysqli, "INSERT course (course_name, start_date, end_date) VALUES ('$course_name', '$start_date', '$end_date')");

    $massiv_jasone['resultOK'] = true;
    $massiv_jasone['message']  = "OK";
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;

?>
