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
  	  <a class="active" href="home.php">Home</a>
 	  <a href="stories.php">Stories</a>
  	  <a href="trophies.php">Trophies</a>
	</div>
	<div class="toppics">
	  <MPTW>Most Popular Trophy This Month: <br><br> 
 	  <?php
            include_once 'Dao.php';
            $dao = new Dao();
  	    $rows = $dao->getTopTrophyA();
            foreach($rows as $row){
  	      echo "Username:" . $row['username'] . "<br>Game:" . $row['game'] . "<br>State:" . $row['state'] . "<br>Unit:" . $row['unit'] . "<br>Caliber" . $row['caliber'] . "<br>Distance:" . $row['distance'] . "<br>" . $row['description'] . "<br>";
	    }
 	  ?>
	  </MPTW>
	  <MPTY>Most Popular Trophy This Year: <br><br> 
          <?php
	    include_once 'Dao.php';
            $dao = new Dao();
  	    $rows = $dao->getTopTrophyA();
            foreach($rows as $row){
  	      echo "Username:" . $row['username'] . "<br>Game:" . $row['game'] . "<br>State:" . $row['state'] . "<br>Unit:" . $row['unit'] . "<br>Caliber" . $row['caliber'] . "<br>Distance:" . $row['distance'] . "<br>" . $row['description'] . "<br>";
	    }
 	   ?>
	   </MPTY>
	</div>
	<div class="topstory">
	  <MPSW>Most Popular Story This Month: <br><br>
          <?php
 	    include_once 'Dao.php';
            $dao = new Dao();
  	    $rows = $dao->getTopStoryA();
            foreach($rows as $row){
  	      echo "Username:" . $row['username'] . "<br>State:" . $row['state'] . "<br>" . $row['story'] . "<br>";
	    }
 	  ?>
		
	  <MPSY>Most Popular Story This Year: <br><br>
	  <?php
	    include_once 'Dao.php';
            $dao = new Dao();
  	    $rows = $dao->getTopStoryA();
            foreach($rows as $row){
  	      echo "Username:" . $row['username'] . "<br>State:" . $row['state'] . "<br>" . $row['story'] . "<br>";
	    }
 	  ?>
	  </MPSY>
	</div>
	<div class="fot">
	  <a>Created my logo at</a>
	  <a href="LogoMakr.com"> LogoMakr.com</a>
	</div>
	</body>
</html>