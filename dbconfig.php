<?php

  /*
  * Our database connection file. To be included in our PHP files that need
  * access to our mySQL database. Does not use any my_sql* commands, as we
  * did in CS3600. Instead, we make use of PDO!
  *
  * References:
  * http://stackoverflow.com/questions/13569/mysqli-or-pdo-what-are-the-pros-and-cons
  * https://code.tutsplus.com/tutorials/why-you-should-be-using-phps-pdo-for-database-access--net-12059
  */

  $db_host = "localhost";
  $db_name = "fjp1010";
  $db_user = "fjp1010";
  $db_pass = "molyterf";

  try{
    $db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
    $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
  session_start();
?>
