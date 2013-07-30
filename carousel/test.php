<?php 
//session_start(); 
$database_name = 'jingo2';
$user = 'yaojiani';
$password = '66200535' ;


$mysqli = mysqli_connect("127.0.0.1", $user, $password, $database_name);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/*$query ="SELECT uid from USER where lastname='yao'";
$result = mysqli_query($con,$query);

while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
	echo $row['uid'];

}*/



$query = "SELECT notetext FROM USER,NOTE WHERE USER.uid=NOTE.uid and email='john@nyu.edu'";

if($result = $mysqli->query($query)) echo "yes";



$row=$result->fetch_array();

echo $row['notetext'];

	



//mysqli_close($con);



//$email = john@nyu.edu;

//$query = "SELECT notetext from USER, NOTE where NOTE.uid=USER.uid and email='".$email."'";

//$result = $mysqli->query($query) or die(mysql_errno());

//while ($row = mysqli_fetch_array($result) {
//	echo $row['notetext'];
//}




//while ($row=$result->fetch_array()) { 
//	echo $row['notetext'];
//}

	?>