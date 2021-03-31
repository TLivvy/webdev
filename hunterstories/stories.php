<html>
	<head>
		<title>Hunter Stories</title>
		<link rel="icon" type="image/jpg" href="/images/deerfav.png"/>
		<link rel="stylesheet" href="style.css">
	</head>
	<body> 
	<div class="topnav">
	  <b><img src="images/logo.png" alt="logo"></b>
  	  <a href="home.php">Home</a>
 	  <a class="active" href="stories.php">Stories</a>
  	  <a href="trophies.php">Trophies</a>
	</div>
	<div class="trophies">
	  <a href="substory.php">Submit a Story</a><br><br><br>
	  <a>New Stories:</a><br><br>
	  <a>
          <?php
	  session_start();
          include_once 'Dao.php';
          $dao = new Dao();
          $rows = $dao-> getStories();
          foreach($rows as $row){
	     echo '<div class "trophies"> Username: ' . $row['username'] . '<br> State: ' . $row['state'] . '<br>' . $row['date'] . '<br>' . $row['story'] . '<br><br></div>'; 
	  }
          ?>
         </a>
	</div>
	<div class="fot">
	  <a>Created my logo at</a>
	  <a href="LogoMakr.com"> LogoMakr.com</a>
	</div>
	</body>
</html>