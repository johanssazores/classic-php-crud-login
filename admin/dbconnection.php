<?php
$con = mysqli_connect("localhost", "root", "", "meal-system");

if(mysqli_connect_errno()) { 
  echo "Connection Fail".mysqli_connect_error(); 
}

$domain =  'http://'.$_SERVER['HTTP_HOST'];
// $domain =  '';


?>