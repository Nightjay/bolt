<?php

  /*
  * The
  *
  *
  * References:
  *
  */

  include("dbconfig.php"); //connects to our database

  if(isset($_POST['action'])){
    unset($_SESSION['username']);
  }

  header('Location: index.html');
?>
