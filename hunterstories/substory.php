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
        <?php
	session_start();
        ?> 
	<div class="topnav">
	  <b><img src="images/logo.png" alt="logo"></b>
  	  <a href="home.html">Home</a>
 	  <a class="active" href="stories.html">Stories</a>
  	  <a href="trophies.html">Trophies</a>
	</div>
	<div class="subtrophy">
	  <form method="post" action="st.php">
	  	<label for="state">State:</label><br>
  	  	<input type="text" id="state" name="state" value=""><br>
		<label for="story">Story:</label><br>
		<textarea id="story" name="story" rows="25" cols="50"></textarea><br><br>
		<input type="submit" value="Submit">
	  </form>
          <?php 
	  include_once 'Dao.php';
	  if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    $state = $_POST['state'];
	    $state = filter_var($state,FILTER_SANITIZE_STRING);
	    $story = $_POST['story'];
	    $story = filter_var($story,FILTER_SANITIZE_STRING);
	    if(empty($story) or count_chars($story) < 50){   
	      echo "I am sure that was a nice story but it was not long enough for us, we are not twitter, we have a minimum character count.";
	    } 
	    else{
	      $dao = new Dao();
	      $username = null;
	      if (isset($_SESSION['sesusername'])) {
	        $username = $_SESSION['sesusername'];
	      }
	      $dao->newStory($username, $state, $story);
	      header("Location:stories.php");
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