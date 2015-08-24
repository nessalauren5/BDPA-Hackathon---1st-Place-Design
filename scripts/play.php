<?php

  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $twitter = isset($_POST['twitter']) ?$_POST['twitter'] : '';
  $instagram = isset($_POST['ig']) ? $_POST['ig'] : '';
  $label = isset($_POST['label']) ? $_POST['label'] : '';

 $dbh=mysqli_connect ("localhost", "lespicku_usr", "Les.Pickup15");
 if(!$dbh){
   die ('I cannot connect to the database.');
 }

 $db_select = mysqli_select_db ($dbh, "lespicku_usr");
 if(!$db_select){
   die ('Database selection failed: ' . mysqli_error());
 }

 $query = mysqli_query($dbh, "select playerid from players where email='$email'");
 $result = mysqli_fetch_row($query);
 $userid = $result[0];

 if(!$result){
   //insert new player into db

   $q = "insert into players (email, name, twitter, instagram, label)
   VALUES ('$email', '$name', '$twitter', '$instagram', '$label')";
   $query = mysqli_query($dbh,$q);
   $userid =  mysqli_insert_id($dbh);
   echo "user added: " . $userid;
 }

   $query = mysqli_query($dbh, "insert into reg (eventid, playerid) VALUES (2, $userid)");
   mysqli_close($dbh);

if(isset($_POST['usrphoto']))
{
  $img =  $_POST['usrphoto'];

 #$img = substr(explode(';' , $img)[1], 7);
 #$img = str_replace(' ', '+', $img);
 $img = base64_decode($img);
 $file = '/tmp/img-user' . $userid . '.jpg';
$success = file_put_contents($file, $img);
echo $success ? $file : 'Unable to save the file.';
}else{
  echo "post upload was not set.";
}
?>
