<?php
require_once('header.php');


$email = $_POST['email'];
$password = md5($_POST['password']);
echo $email;

$query = "SELECT * FROM USER WHERE email='".$email."' AND password = '".$password."'";
$result = $mysqli->query($query);

if($result->num_rows == 1){
  $_SESSION['email'] = $email;
  $_SESSION['loggedin'] = true;
  header('Location: home.php') ;

} else {
  header('Location:create_new_user.php');
}
require_once('footer.php');
?>