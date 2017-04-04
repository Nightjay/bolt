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

  if(!empty($_POST)){
    // data validation
    if((3>=strlen($_POST['registerUsername'])) or (16<=strlen($_POST['registerUsername']))){
      echo "1";
		}
    elseif(((5>strlen($_POST['registerPassword'])) or (strlen($_POST['registerPassword'])>17)) and ((5>strlen($_POST['validatePassword'])) or (strlen($_POST['validatePassword'])>17))){
			echo "2";
		}
    elseif(($_POST['registerPassword']) != ($_POST['validatePassword'])){
      echo "3";
    }

    // passes validation
    else{
      $fname = $_POST['inputFirst'];
      $lname = $_POST['inputLast'];
      $username = $_POST['registerUsername'];
      $password= md5($_POST['registerPassword']); //hash the password
      $registrationDate = date('Y-m-d');

      try{
        $query = $db_con->prepare("SELECT * FROM Users WHERE username=:username");
        $query->execute(array(":username"=>$username));
        $count=$query->rowCount();

        if($count==0){ //if the username is available, create the user
          $query = $db_con->prepare("INSERT INTO Users(fname,lname,username,password,registrationDate) VALUES(:fname,:lname,:username,:password,:registrationDate)");
          $query->bindParam(":fname",$fname);
          $query->bindParam(":lname",$lname);
          $query->bindParam(":username",$username);
          $query->bindParam(":password",$password);
          $query->bindParam(":registrationDate",$registrationDate);

          if($query->execute()){
            //now that we have created a user, create the user's default deck
            $uid = $db_con->lastInsertId();
            $deckName = 'MyDeck';
            $deckDesc = 'A short description about my deck.';

            $stmt = $db_con->prepare("INSERT INTO Decks(uid,deckName,deckDesc) VALUES(:uid,:deckName,:deckDesc)");
            $stmt->bindParam(":uid",$uid);
            $stmt->bindParam(":deckName",$deckName);
            $stmt->bindParam(":deckDesc",$deckDesc);

            if($stmt->execute()){
              echo "100";
            }
            else{
              echo "Unable to create your default deck.";
            }
          }
        else{
          echo "Could not execute your query.";
        }
      }
      else{
          echo "99"; //username not available
      }
    }
      catch(PDOException $e){
        echo $e->getMessage();
      }
    }
  }
?>
