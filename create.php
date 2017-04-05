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

    <title>Bolt Create</title>
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

    <!-- ::::::::::::::::: Deck Header ::::::::::::::::: -->
    <div class="container">
        <div class="row"><h1> </h1></div>
        <div class="row">
            <div class="col-md-12">
                <h1>Goblin OST</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <form class="form-inline" id="CardForm">
                <div class="form-group">
                  <input type="text" class="form-control" id="inputText" placeholder="Term">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="inputDefinition" placeholder="Definition">
                </div>
                <button class="btn btn-success" onclick="addRecord()">Add Card</button>
              </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Cards:</h3>
                <div class="records_content"></div>
            </div>
        </div>
    </div>

    <!-- ::::::::::::::::::::::: Modals ::::::::::::::::::::::: -->

    <!-- Update Card Modal -->
    <div class="modal fade" id="updateCardModal" tabindex="-1" role="dialog" aria-labelledby="updateCardModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove-sign"aria-hidden="true"></span></button>
                  <h4 class="modal-title" id="updateCardModalLabel">Update</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group"><input type="text" id="updateTerm" placeholder="Term" class="form-control"></div>
                    <div class="form-group"><input type="text" id="updateDefinition" placeholder="Definition" class="form-control"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="updateCard()">Save</button>
                    <input type="hidden" id="hiddenCardID">
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
    // Add Record
    function addCard() {
        // get values
        var inputTerm = $("#inputTerm").val();
        var inputDefinition = $("#inputDefinition").val();

        // Add record
        $.post("addCard.php", {
            inputTerm: inputTerm,
            inputDefinition: inputDefinition,
        }, function (data, status) {

            // read records again
            readCard();

            // clear fields from the popup
            $("#inputTerm").val("");
            $("#inputDefinition").val("");
        });
    }

    // READ records
    function readCard() {
        $.get("readCard.php", {}, function (data, status) {
            $(".records_content").html(data);
        });
    }


    function DeleteCard(cid) {
        var conf = confirm("Warning: You are about to delete this card.");
        if (conf == true) {
            $.post("deleteCard.php", {
                    cid: cid
                },
                function (data, status) {
                    // reload Users by using readRecords();
                    readCard();
                }
            );
        }
    }

    function getCard(id) {
        // Add card ID to the hidden field for furture usage
        $("#hiddenCardID").val(id);
        $.post("getCard.php", {
                cid: cid
            },
            function (data, status) {
                // PARSE json data
                var card = JSON.parse(data);
                // Assing existing values to the modal popup fields
                $("#updateTerm").val(card.inputTerm);
                $("#updateDefinition").val(card.inputDefinition);
            }
        );
        // Open modal popup
        $("#updateCardModal").modal("show");
    }

    function updateCard() {
        // get values
        var updateTerm = $("#updateTerm").val();
        var updateDefinition = $("#updateDefinition").val();

        // get hidden field value
        var id = $("#hiddenCardID").val();

        // Update the details by requesting to the server using ajax
        $.post("updateCard.php", {
                cid: cid,
                inputTerm: inputTerm,
                inputDefinition: inputDefinition,
            },
            function (data, status) {
                // hide modal popup
                $("#updateCardModal").modal("hide");
                // reload Users by using readRecords();
                readCard();
            }
        );
    }

    $(document).ready(function () {
        // READ recods on page load
        readCard(); // calling function
    });
    </script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
