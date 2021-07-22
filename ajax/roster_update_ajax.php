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
    // $date_array = array();
    $date_list = "";

    foreach($dataJson as $event => $massiv){
      foreach($massiv['jc_list']  as  $key => $value){
        if ($value !== "0") {
          $date_event = date("Y-m-d", strtotime($massiv['start']));
          $data_string = $data_string . $separator . "(" . $massiv['ev_id_class'] . ", " . $value . ", '" . $date_event . "')";

          // $date_array[] = $date_event;
          $date_list = $date_list . $separator . "'" . $date_event . "'";

          $separator = ", ";

        }
      }
    }

    // delete previous records for the same period
    $sql_delete = "DELETE FROM history_availability WHERE shift_date IN ($date_list)";
    dbQuery($sql_delete);

    // insert new records
    $sql = "INSERT INTO history_availability (id_class, id_user, shift_date) VALUES " . $data_string;
    //dbQuery - function in database.php
    dbQuery($sql);


    // send email begin

    // get email of jr. coaches
    $sql_emails = "SELECT u.email, u.first_name, u.last_name FROM history_availability h JOIN users u on h.id_user=u.id_user
    WHERE h.shift_date IN ($date_list) GROUP BY u.email";
    //dbQuery - function in database.php
    $email_list_result = dbQuery($sql_emails);

    $email_sender = "nyudina.nz@gmail.com";
    $email_receiver = "nyudina.nz@gmail.com";
    $email_subject = "You are assigned to a job";
    $email_message = "Please check your shifts in the app";

    // $BodyMessage = '
    //   <html>
    //       <head>
    //           <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    //           <title>Title</title>
    //       </head>
    //       <body>
    //           <p>' . $email_message . '</p>
    //
    //       </body>
    //   </html>
    //   ';


  // ===========
  //Import PHPMailer classes into the global namespace
  //These must be at the top of your script, not inside a function
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  //Load Composer's autoloader
  require '../vendor/autoload.php';

  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);
  try {
      //Server settings
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = $email_sender;                     //SMTP username
      $mail->Password   = '';                               //SMTP password
      // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
      $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom($email_sender, 'MBSC Roster Admin');
      $mail->addAddress($email_receiver, 'Joe User');     //Add a recipient //Name is optional

      while($row = dbFetchAssoc($email_list_result)) {
    		extract($row);
        $mail->addAddress($email, $first_name . " " . $last_name);
      }

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = $email_subject;
      $mail->Body    = $email_message;
      $mail->AltBody = 'Please check your shifts in the app';

      $mail->send();
      // echo 'Message has been sent';
  } catch (Exception $e) {
      // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
// ==========

  //
  // if (!$mail->send()) {
  //     header('Content-type: application/json; charset=utf-8');
  //     $massiv_jasone['resultOK'] = false;
  //     $massiv_jasone['message']  = 'ERROR';
  //     $jason_encode              = json_encode($massiv_jasone);
  //     echo $jason_encode;
  // } else {
  //     header('Content-type: application/json; charset=utf-8');
  //     $massiv_jasone['resultOK'] = true;
  //     $massiv_jasone['message']  = 'OK';
  //     $jason_encode              = json_encode($massiv_jasone);
  //     echo $jason_encode;
  // }
    // send email end

    header('Content-type: application/json; charset=utf-8');

    $massiv_jasone['resultOK'] = true;
    $massiv_jasone['message']  = "OK";
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;

?>
