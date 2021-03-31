<?php
session_start();
include_once 'Dao.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $username = filter_var($username, FILTER_SANITIZE_STRING);
  $password = $_POST['password'];
  $password = filter_var($password, FILTER_SANITIZE_STRING);
  if (empty($username) or empty($password)){
    echo "please fill both fields";
  }
  else{
    $dao = new Dao();
    $users = $dao->getUser();
    $vaild = false;
    $admin = 0;
    foreach ($users as $user){
      if(strcmp($user['username'],$username) === 0 and strcmp($user['password'],$password) ===0 ){
        $valid = true;
        $admin = $user['admin'];
        break;
      } 
    }
    if($valid === true){
	
	$_SESSION['sesusername'] = $username;
        $_SESSION['sesadmin'] = $admin;
        header("Location:home.html");
     }else{
        echo "Incorrect username or password";
     }
  }

}
?>