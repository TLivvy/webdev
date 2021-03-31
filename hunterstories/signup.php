<?php
session_start();
include_once 'Dao.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $email = $_POST['email'];
  $email = filter_var($email, FILTER_SANITIZE_STRING);
 
  $username = $_POST['username'];
  $username = filter_var($username, FILTER_SANITIZE_STRING);
  $password = $_POST['password'];
  $password = filter_var($password, FILTER_SANITIZE_STRING);
  $check = $_POST['check'];
  $check = filter_var($check, FILTER_SANITIZE_STRING);
  if (empty($email) or empty($username) or empty($password) or empty($check) or !preg_match("/\w{1,30}@\w{1,15}\.(net|com|org)/", $email)) {
    echo "Please fill out all fields correctly";
  } else {
    if (strcmp($check, $password) != 0) {
      echo "Passwords do not match";
    }
    else {
      $dao = new Dao();
      $names = $dao->getuser();
      $used = false;
      foreach ($names as $n){
	if(strcmp($n['username'],$username) === 0 and strcmp($n['password'],$password) === 0){
	  $used = true;
          break;
	}
      }
      if($used === false){
	$dao->newuser($email, $username, $password);
        $_SESSION["sesusername"] = $username;
        header("Location:home.html");
      }
      else{
        echo "username or email is already used";
      }
    }
  }
}
?>