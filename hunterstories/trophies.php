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
 	  <a href="stories.php">Stories</a>
  	  <a class="active" href="trophies.php">Trophies</a>
	</div>
	<div class="subnav">
	  <a class="active">All</a>
	  <a>Deer</a>
  	  <a>Elk</a>
	  <a>Bear</a>
	  <a>Moose</a>
	  <a>Sheep</a>
	  <a>Pronghorn</a>
	  <a>Predators</a>
	</div>
	<div class="trophies">
	  <a href="subtrophy.php">Submit a Trophy</a><br><br><br>
	  <a>New Trophies:</a><br><br>
	  <a>
	  <?php
	     include_once 'Dao.php';
	     $dao = new Dao();
	     $rows = $dao->getTrophies();
 	     foreach($rows as $row){
 	       echo "Username: " . $row['username'] . "<br>Game: " . $row['game'] . "<br>State:" . $row['state'] . "<br>Unit: " . $row['unit'] . "<br>Caliber: " . $row['caliber'] . "<br>Distance: " . $row['distance'] . "yds<br>" . $row['description'] . "<br><br>";
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