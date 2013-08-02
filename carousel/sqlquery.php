<?php 
$database_name = 'jingo2';
$user = 'yaojiani';
$password = '66200535' ;


$mysqli = mysqli_connect("127.0.0.1", $user, $password, $database_name);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query3 = "SELECT uid FROM USER WHERE email='john@nyu.edu'";
$uid = $mysqli->query($query3);

while($row=$uid->fetch_array(MYSQLI_BOTH)){
	echo $row['uid'];
}
	
                
                

?>