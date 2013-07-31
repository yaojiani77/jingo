<?php
//require_once('header.php');



$geolat= $_POST['geolat'];
$geolng= $_POST['geolng'];
echo $geolat;
echo $geolng;


$lat= $_POST['lat'];
$lng= $_POST['lng'];
echo $lat;
echo $lng;
$note=$_POST['note'];
echo $note;

/*$query="SELECT uid FROM USER WHERE email='".$email."'";
$uid=$mysqli->query($query);*/

//session_start(); 

if($note){
$database_name = 'jingo2';
$user = 'yaojiani';
$password = '66200535' ;


$mysqli = mysqli_connect("127.0.0.1", $user, $password, $database_name);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query2= "INSERT INTO NOTE (uid,notetext,x,y,x1,y1)
VALUES ('7','$_POST[note]','$_POST[lat]','$_POST[lng]','40','50')";

$mysqli->query($query2);

}












?>