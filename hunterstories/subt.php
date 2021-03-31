<?php 
session_start();
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
  
  if(empty($state) or empty($photodir){   
    echo "Make sure you added the state and a picture!";
  } 
  else{
    $dao = new Dao();
    $username = null;
    if (isset($_SESSION['sesusername'])) {
      $username = $_SESSION['sesusername'];
    }
    $dao->newStory($username, $state, $unit, $caliber, $distance, $description, $photodir);
    header("Location:trophies.html");
  }
}
?>