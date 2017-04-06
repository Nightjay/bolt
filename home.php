<?php
  include("dbconfig.php");

  if($_SESSION['loggedIn'] == false){
    header('Location: /~fjp1010/bolt');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bolt Homepage</title>
    <link href="bolt.ico" rel="shortcut">

    <!-- :::::::::::::::::::::: CSS ::::::::::::::::::::::::: -->
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="carousel.css" rel="stylesheet">
    <!-- Flat UI stylesheet -->
    <!-- Reference: http://designmodo.github.io/Flat-UI/docs/getting-started.html -->
    <link href="dist/css/flat-ui.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

<!-- ::::::::::::::::: Navigation Bar ::::::::::::::::::::::: -->
  <body>
    <div class="navbar-wrapper">
      <div class="container-fluid">
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="home.php">Bolt</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="#" data-toggle="modal" data-target="#createModal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Create</a></li>
                <li><a href="#" data-toggle="modal" data-target="#quizModal"><span class="glyphicon glyphicon-education" aria-hidde="true"></span> Quiz</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-remove" aria-hidde="true"></span> Logout</a></li>
                <li>
                  <a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $_SESSION['username']; ?></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <!-- ::::::::::::::::::::::: Carousel ::::::::::::::::::::::: -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img class="first-slide" src="1st.jpg" alt="First slide">
        <div class="container">
          <div class="carousel-caption">
            <h1>Create a deck</h1>
            <p>A deck allows you to hold cards of a similar topic.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Create deck</a></p>
          </div>
        </div>
      </div>
      <div class="item">
        <img class="second-slide" src="2nd.png" alt="Second slide">
        <div class="container">
          <div class="carousel-caption">
            <h1>Create a card</h1>
            <p>A card contains a term and definition, things that you define that you can later organize into decks.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Create card</a></p>
          </div>
        </div>
      </div>
      <div class="item">
        <img class="third-slide" src="3rd.jpg" alt="Third slide">
        <div class="container">
          <div class="carousel-caption">
            <h1>Quiz yourself</h1>
            <p>Once you have made your own decks with cards, you can study them. Get grades, and improve.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Quiz me</a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div> <!-- /.carousel -->

  <!-- ::::::::::::::::::: Modals ::::::::::::::::::: -->

  <!-- Create Modal -->
  <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove-sign"aria-hidden="true"></span></button>
          <h3 class="form-signin-heading" align="left">What would you like to create?</h3>
        </div>
        <div class="modal-body">
          <center>
          <button class="btn btn-hg btn-info" name="createCardButton" id="createCardButton" type="button" data-dismiss="modal" data-toggle="modal" data-target="#createCardModal">Create card</button>
          <button class="btn btn-hg btn-info" name="createDeckButton" id="createDeckButton" type="button" data-dismiss="modal" data-toggle="modal" data-target="#createDeckModal">Create deck</button>
          </center>
        </div>
        <div class="modal-footer bg-primary">
          <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Create Card Modal -->
  <div class="modal fade" id="createCardModal" tabindex="-1" role="dialog" aria-labelledby="createCardModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove-sign"aria-hidden="true"></span></button>
          <h3 class="form-signin-heading" align="left">Create Card</h3>
        </div>
        <div class="modal-body">
          <!-- Create card form -->
          <center>
            <p>Which deck would you like to create these cards in?</p>
            <div class="form-group">
              <button class="btn btn-lg btn-primary" name="createCardInDeckButton" id="createCardInDeckButton" type="button" data-toggle="dropdown">Select deck</button>
            </div>
          </center>
        </div>
        <div class="modal-footer bg-primary">
          <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Create Deck Modal -->
  <div class="modal fade" id="createDeckModal" tabindex="-1" role="dialog" aria-labelledby="createDeckModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove-sign"aria-hidden="true"></span></button>
          <h3 class="form-signin-heading" align="left">Create Deck</h3>
        </div>
        <div class="modal-body">
          <!-- Create deck Form -->
          <form id="createDeckForm" name="createDeckForm">
            <div class="form-group"><input type="text" name="inputDeckName" id="inputDeckName" class="form-control" placeholder="Deck name"></div>
            <div class="form-group"><input type="text" name="inputDeckDesc" id="inputDeckDesc" class="form-control" placeholder="Deck description"></div>

            <center><button class="btn btn-hg btn-info" name="createDeckFinalButton" id="createDeckFinalButton" type="submit">Create deck</button></center>
          </form>
        </div>
        <div class="modal-footer bg-primary">
          <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Quiz Modal -->
  <div class="modal fade" id="quizModal" tabindex="-1" role="dialog" aria-labelledby="quizModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove-sign"aria-hidden="true"></span></button>
          <h3 class="form-signin-heading" align="left">Quiz</h3>
        </div>
        <div class="modal-body">
          <!-- Create card form -->
          <center>
            <p>Which deck would you like to be quized on?</p>
            <div class="form-group">
              <button class="btn btn-lg btn-primary" name="quizButton" id="quizButton" type="button" data-toggle="dropdown">Select deck</button>
            </div>
          </center>
        </div>
        <div class="modal-footer bg-primary">
          <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
      </div>
    </div>
  </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- ::::::::::::::::::::: jQuery and AJAX :::::::::::::::::::::: -->
    <script>
    $(document).ready(function(){
      /*
      * This is for the createDeck.php file.
      */
      $('#createDeckForm').on("submit",function(event){
        event.preventDefault();

        if($('#inputDeckName').val() == ""){
          alert("Please do not leave the entries blank.");
        }
        else if($('#inputDeckDesc').val() == ""){
          alert("Please do not leave the entries blank.");
        }
        else{
          $.ajax({
            url:"createDeck.php",
            method:"POST",
            data:$('#createDeckForm').serialize(),
            success:function(data){
              if(data == "1"){
                alert("Sucess! Your deck has been created. Please add some cards to get started!");
              }
              else if(data == "0"){
                alert("You already have a deck under this name. Please try another name.");
              }
              else{
                alert("Unknown error. Please try again.");
              }
            }
          });
        }
      });
    });
    </script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
