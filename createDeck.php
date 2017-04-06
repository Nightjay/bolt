<?php

  /*
  * This file handles the user registration. Using prepared statements and
  * parameterized queries, we are able to avoid SQL injection. In addition,
  * we use a faster and safer method of handling input from the user, that
  * formats itself!
  *
  * References:
  * https://phpdelusions.net/sql_injection
  * http://stackoverflow.com/questions/60174/how-can-i-prevent-sql-injection-in-php
  * https://www.w3schools.com/php/php_mysql_prepared_statements.asp
  * http://php.net/manual/en/pdostatement.bindparam.php
  * https://www.w3schools.com/php/php_mysql_insert_lastid.asp
  */

  include "dbconfig.php"; //connects to our database

  if(isset($_POST)){

    $deckName = $_POST['inputDeckName'];
    $deckDesc = $_POST['inputDeckDesc'];

    try{
      $query = $db_con->prepare("SELECT * FROM Decks WHERE deckName=:deckName");
      $query->execute(array(":deckName"=>$deckName));
      $count=$query->rowCount();

      if($count==0){ //if the deck name is available, create the user
        $query = $db_con->prepare("INSERT INTO Decks(deckName,deckDesc) VALUES(:deckName,:deckDesc)");
        $query->bindParam(":deckName",$deckName);
        $query->bindParam(":deckDesc",$deckDesc);

        if($query->execute()){
            echo "1";
          }
        }
      else{
          echo "0"; //deck name not available
      }
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }
  }
?>
