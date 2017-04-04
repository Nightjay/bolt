<?php
  include("dbconfig.php");
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
                <li><a href="create.php"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Create</a></li>
                <li><a href="quiz.php"><span class="glyphicon glyphicon-education" aria-hidde="true"></span> Quiz</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="index.html" id="logoutButton"><span class="glyphicon glyphicon-remove" aria-hidde="true"></span> Logout</a></li>
                <li>
                  <a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $_SESSION['username']; ?></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active" style="object-first:">
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
  </div><!-- /.carousel -->

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
      var $item = $('.carousel .item');
      var $wHeight = $(window).height();
      $item.eq(0).addClass('active');
      $item.height($wHeight);
      $item.addClass('full-screen');

      $('.carousel img').each(function() {
        var $src = $(this).attr('src');
        var $color = $(this).attr('data-color');
        $(this).parent().css({
          'background-image' : 'url(' + $src + ')',
          'background-color' : $color
        });
        $(this).remove();
      });

      $(window).on('resize', function (){
        $wHeight = $(window).height();
        $item.height($wHeight);
      });
    });
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
