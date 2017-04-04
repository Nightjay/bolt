<?php

  /*
  * This file handles the user login. This page is very similar to the
  * registration page. Please see that page for specific comments.
  *
  * References:
  *
  */

  include("dbconfig.php"); //connects to our database

  if(isset($_POST['inputUsername'])){
    $username = $_POST['inputUsername'];
    $password = md5($_POST['inputPassword']); //hash the password

    try{
      $query = $db_con->prepare("SELECT * FROM Users WHERE username=:username AND password=:password");
      $query->execute(array(":username"=>$username,":password"=>$password));
      $count=$query->rowCount();

      if($count==1){
        if($query->execute()){
          $_SESSION['loggedIn'] = true;
          $_SESSION['username'] = $username;

          echo "1";
        }
      }
      else{
          echo "0"; // false = user was not successfully logged in
      }
    }
      catch(PDOException $e){
          echo $e->getMessage();
    }
  }

?>
