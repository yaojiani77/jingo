<?php
$timefrom = $_GET['timefrom'];
$timeto = $_GET['timeto'];
$datefrom = $_GET['datefrom'];
$dateto = $_GET['dateto'];
$repeatday = $_GET['repeatday'];
$note = $_GET['note'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$email = $_GET['email'];



$database_name = 'jingo2';
$user = 'yaojiani';
$password = '66200535' ;


$mysqli = mysqli_connect("127.0.0.1", $user, $password, $database_name);

// check connection 
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT uid FROM USER WHERE  email='".$email."'";
$uid = $mysqli->query($query);
$row=$uid->fetch_array(MYSQLI_BOTH);
//echo $row['uid'];

	


$query2= "INSERT INTO NOTE (uid,notetext,x,y,x1,y1)
VALUES ('$row[uid]','$note','$lat','$lng','40','50')";

$mysqli->query($query2);







$respond = $timefrom." , ".$timeto." , ".$datefrom." , ".$dateto." , ".$repeatday." , ".$note." , ".$lat." , ".$lng." , ".$email;
echo $respond;



?>