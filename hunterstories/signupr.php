<?php 
session_start();
?>
<html>
	<head>
		<title>Hunter Stories</title>
		<link rel="icon" type="image/jpg" href="/images/deerfav.png"/>
		<link rel="stylesheet" href="style.css">
		
	</head>
	
	<body> 
	<div class="topnav">
	  <b><img src="images/logo.png" alt="logo"></b>
	</div>
	<div class="signup">
	<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
	  SIGN UP <br>
          <label for="email">E-Mail:</label>
  	  <input type="text" id="email" name="email" value=""></a><br>
	  <label for="username">Username:</label>
  	  <input type="text" id="username" name="username" value=""></a><br>
          <label for="password">Password:</label>
  	  <input type="text" id="password" name="password" value=""></a><br>
	  <label for="check">Retype Password:</label>
  	  <input type="text" id="check" name="check" value=""></a><br><br>
          <input type="submit" id="sign" value="Sign Up"><br>
	</form>
	<?php
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
	        header("Location:home.php");
	      }
	      else{
	        echo "username or email is already used";
	      }
	    }
  	  }
	}
	?>
	</div>
	<div class="login">
	<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
	  LOGIN <br>
	  <label for="username">Username:</label>
  	  <input type="text" id="username" name="username" value=""></a><br>
          <label for="password">Password:</label>
  	  <input type="text" id="password" name="password" value=""></a><br><br>
	  <input type="submit" id="log" value="Login">
	</form>
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
            header("Location:home.php");
          }else{
            echo "Incorrect username or password";
          }
         }

        } 
        ?>
        </div>
	<div class="fot">
	  <a>Created my logo at</a>
	  <a href="LogoMakr.com"> LogoMakr.com</a>
	</div>
	</body>
</html>