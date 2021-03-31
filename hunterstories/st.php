<?php 
session_start();
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