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
	  <form>
	  <b><img src="images/logo.png" alt="logo"></b>
  	  <a href="home.php">Home</a>
 	  <a href="stories.php">Stories</a>
  	  <a class="active" href="trophies.php">Trophies</a>
	</div>
	<div class="subtrophy">
	  <form action="subt.php" method="post">
	  	<label for="animal">Game:</label><br>
  	  	<select name="game" id="game">
    	  	  <option value="deer">Deer</option>
     	  	  <option value="elk">Elk</option>
    	  	  <option value="bear">Bear</option>
    	  	  <option value="moose">Moose</option>
	    	  <option value="sheep">Sheep</option>
	    	  <option value="prong">Pronghorn</option>
	  	  <option value="pred">Predator</option>
  	  	</select><br>
	  	<label for="state">State:</label><br>
  	  	<input type="text" id="state" name="state" value=""><br>
		<label for="unit">Unit(optional):</label><br>
  	  	<input type="text" id="unit" name="unit" value=""><br>
	  	<label for="caliber">Caliber:</label><br>
  	  	<input type="text" id="caliber(optional):" name="caliber" value=""><br>
	  	<label for="dist">Distance(optional:</label><br>
  	  	<input type="text" id="dist" name="dist" value=""><br>
		<label for="desc">Description(optional):</label><br>
		<textarea id="desc" id="desc" name="desc" rows="4" cols="50"></textarea><br><br>
  	  	<input type="submit" value="Submit">
	  </form>
<?php 
include_once 'Dao.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $game = $_POST['game'];
  $state = $_POST['state'];
  $state = filter_var($state,FILTER_SANITIZE_STRING);
  $unit= $_POST['unit'];
  $unit = filter_var($story,FILTER_SANITIZE_STRING);
  $caliber = $_POST['caliber'];
  $caliber = filter_var($caliber,FILTER_SANITIZE_STRING);
  $distance = $_POST['dist'];
  $distance = filter_var($distance,FILTER_SANITIZE_STRING);
  $description = $_POST['desc'];
  $description = filter_var($description,FILTER_SANITIZE_STRING);
  $photodir = $_SESSION['photo'];
  
  if(empty($state)){   
    echo "Make sure you added the state";
  } 
  else{
    $dao = new Dao();
    $username = null;
    if (isset($_SESSION['sesusername'])) {
      $username = $_SESSION['sesusername'];
    }
    $dao->newTrophy($username, $game, $state, $unit, $caliber, $distance, $description, $photodir);
    header("Location:trophies.php");
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