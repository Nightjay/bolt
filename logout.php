<?php

  /*
  * The
  *
  *
  * References:
  *
  */

  include("dbconfig.php"); //connects to our database

  unset($_SESSION['username']);
  $_SESSION['loggedIn'] = false;

  header('Location: /~fjp1010/bolt');
?>
