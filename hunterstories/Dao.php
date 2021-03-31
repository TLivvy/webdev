<?php

class Dao {
  //server
  public $servername = "us-cdbr-east-03.cleardb.com";
  public $username = "bd9436b91fd206";
  public $password = "7ba7e6b3";
  public $dbname = "heroku_056af14bfa1586e";
  public $dsn = "mysql:dbname=heroku_056af14bfa1586e;host=us-cdbr-east-03.cleardb.com";

  private function getConnection () {
    try{
      $connection = new PDO($this->dsn, $this->username, $this->password);
    } catch (PDOExeception $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    return $connection;
  }
  
  public function getStories() {
    $connection = $this->getConnection();
    try {
      $rows = $connection->query("select * from stories order by date desc");
    } catch(Exception $e) {
      echo print_r($e,1);
    }
    return $rows;
  }

  public function getTrophies() {
    $connection = $this->getConnection();
    try {
      $rows = $connection->query("select * from trophies order by date desc");
    } catch(Exception $e) {
      echo print_r($e,1);
    }
    return $rows;
  }

  public function getTopStoryM() {
    $connection = $this->getConnection();
    try {
      $rows = $connection->query("select * from stories where (date <= '2021-4-31') and (date >= '2021-4-1') order by votes desc limit 1");
    } catch(Exception $e) {
      echo print_r($e,1);
    }
    return $rows;
  }

  public function getTopStoryA () {
    $connection = $this->getConnection();
    try {
      $rows = $connection->query("select * from stories order by votes desc limit 1");
    } catch(Exception $e) {
      echo print_r($e,1);
    }
    return $rows;
  }

  public function getTopTrophyM () {
    $connection = $this->getConnection();
    try {
      $rows = $connection->query("select * from trophies where (date <= '2021-4-31') and (date >= '2021-4-1') order by votes desc limit 1");
    } catch(Exception $e) {
      echo print_r($e,1);
    }
    return $rows;
  }

  public function getTopTrophyA () {
    $connection = $this->getConnection();
    try {
      $rows = $connection->query("select * from trophies order by votes desc limit 1");
    } catch(Exception $e) {
      echo print_r($e,1);
    }
    return $rows;
  }

  public function newTrophy ($username, $game, $state, $unit, $caliber, $distance, $description, $photolocation) {
    $date = date("Y-m-d");
    $votes = 0 ;
    $connection = $this->getConnection();
    $saveQuery = "insert into tropies(username, game, state, unit, caliber, distance, description, photolocation, date, votes) values(:username, :game, :state, :unit, :caliber, :distance, :description, :photolocation, :date, :votes)";
    $q = $connection->prepare($saveQuery);
    $q->bindParam("username",$username);
    $q->bindParam("game",$game);
    $q->bindParam(":state",$state);
    $q->bindParam(":unit", $unit);
    $q->bindParam(":caliber",$caliber);
    $q->bindParam(":distance",$distance);
    $q->bindParam(":description",$description);
    $q->bindParam(":photolocation",$photolocation);
    $q->bindParam(":date",$date);
    $q->bindParam(":votes",$votes);
    $q->execute();
  }

  public function newStory($username, $state, $story) {
    $date = date("Y-m-d");
    $votes = 0 ;
    $connection = $this->getConnection();
    $saveQuery = "insert into stories(username, state, story, date, votes) values(:username, :state, :story, :date, :votes)";
    $q = $connection->prepare($saveQuery);
    $q->bindParam(":username",$username);
    $q->bindParam(":state",$state);	
    $q->bindParam(":story",$story);
    $q->bindParam(":date",$date);
    $q->bindParam(":votes",$votes);
    $q->execute();
  }

  public function newUser($email, $username, $password) {
    $admin = 0;
    $connection = $this->getConnection();
    $saveQuery = "insert into user(email, username, password, admin) values(:email, :username, :password, :admin)";
    $q = $connection->prepare($saveQuery);
    $q->bindParam(":email",$email);
    $q->bindParam(":username",$username);
    $q->bindParam(":password",$password);
    $q->bindParam(":admin",$admin);
    $q->execute();
  }

  public function getUser() {
    $connection = $this->getConnection();
    try {
      $rows = $connection->query("select * from user");
    } catch(Exception $e) {
      echo print_r($e,1);
    }
    return $rows;
  }
  
  public function create(){
  $connection = $this->getConnection();
    try {
      $connection->query("CREATE TABLE stories (storyid INTEGER(150) NOT NULL AUTO_INCREMENT PRIMARY KEY,username VARCHAR(64) NOT NULL,state VARCHAR(15),story VARCHAR(2000) NOT NULL,date VARCHAR(11) NOT NULL,votes INTEGER(150) NOT NULL
);");
    } catch(Exception $e) {
      echo print_r($e,1);
      echo "story";
    }
    try {
      $connection->query("CREATE TABLE trophies (trophyid INTEGER(150) NOT NULL PRIMARY KEY AUTO_INCREMENT,username VARCHAR(64) NOT NULL,game VARCHAR(10) NOT NULL,state VARCHAR(15) NOT NULL,unit VARCHAR(5),caliber VARCHAR(15),distance INTEGER(5),description VARCHAR(250),photolocation VARCHAR(256) NOT NULL,date VARCHAR(11) NOT NULL,votes INTEGER(150) NOT NULL);");
    } catch(Exception $e) {
      echo print_r($e,1);
      echo "trophy";
    }
    try {
      $connection->query("CREATE TABLE user (email VARCHAR(75) NOT NULL PRIMARY KEY,username VARCHAR(64) NOT NULL,password VARCHAR(64) NOT NULL,admin INTEGER(1) NOT NULL
);");
    } catch(Exception $e) {
      echo print_r($e,1);
      echo "user";
    }
  
  }


}
?>