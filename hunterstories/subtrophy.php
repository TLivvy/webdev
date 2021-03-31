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
	<div class="subtrophy">
	  <form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
		Choose picture to upload:<br><br>
		<input type="file" id="fileToUpload" name="fileToUpload"><br><br>
  	  	<input type="submit" value="Next" name"submit"> 
	  </form>
	<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$target_dir =  "userpics";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$_SESSION['photo'] = $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image. ";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists. ";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large. ";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) { 
  echo "Sorry, only JPG, JPEG, PNG are allowed. ";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    header("Location:subtrophydetails.php");
  } else {
    echo "Sorry, there was an error uploading your file.";
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