<?php

  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $twitter = $_POST['twitter'];
  $message = $_POST['message'];
  $email_from = 'ideas@lespickup.com';
  $email_subject = "Idea Submission";

  $msg = "Name: " . $name . "\r\n" .
                "Email:" . $visitor_email . "\r\n" .
                "Twitter handle:" . $twitter . "\r\n" .
                "Message:" . $message . "\r\n";
    $email_body = "You have received a new message from the user $name.\n".
                    "Here is the message:\n $msg".
  $to = 'ideas@lespickup.com';

 $headers = "From: $email_from \r\n";

 $headers .= "Reply-To: $visitor_email \r\n";

 mail($to,$email_subject,$email_body,$headers);
?>
