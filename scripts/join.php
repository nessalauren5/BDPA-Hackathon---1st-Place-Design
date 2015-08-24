<?php

  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $birthday = $_POST['birthday'];
  $twitter = $_POST['twitter'];
  $instagram = $_POST['ig'];
  $location = $_POST['location'];
  $interests = $_POST['interests'];
  $other = $_POST['other'];
  $email_from = 'subscribe@lespickup.com';
  $email_subject = "Subscription";

  $msg = "Name: " . $name . "\r\n" .
                 "Location:" . $location . "\r\n" .
                "Email:" . $visitor_email . "\r\n" .
                "Birthday:" . $birthday . "\r\n" .
                "Twitter handle:" . $twitter . "\r\n" .
                "Instagram handle: " . $instagram . "\r\n" .
                "Interests:" . $interests . "\r\n" .
                "Other Interests:" . $other . "\r\n";
    $email_body = "You have received a new message from the user $name.\n".
                    "Here is the message:\n $msg".
  $to = 'subscribe@lespickup.com';

 $headers = "From: $email_from \r\n";

 $headers .= "Reply-To: $visitor_email \r\n";

 mail($to,$email_subject,$email_body,$headers);
?>
