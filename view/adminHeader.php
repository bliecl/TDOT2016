<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/favicon.ico">

    <title><?php echo $title;?></title>

    <link rel="stylesheet" href="https://github.com/necolas/normalize.css/blob/master/normalize.css" type="text/css" />
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-blue.min.css" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400,300" type="text/css" />
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <link href="/view/css/admin.css" rel="stylesheet" />
  </head>

  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title"><?php echo $title?></span>
          <!-- Add spacer, to align navigation to the right -->
          <div class="mdl-layout-spacer"></div>
          <!-- Navigation. We hide it in small screens. -->

          <!-- Right aligned menu below button -->
      <nav class="mdl-navigation">
        <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){

          echo '<nav class="mdl-navigation mdl-layout--small-screen-only">

          <button id="demo-menu-lower-right"
          class="mdl-button mdl-js-button mdl-button--icon">
          <i class="material-icons">more_vert</i>
          </button>

          <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
          for="demo-menu-lower-right">';



          $registerLinkSmall = ' href="/admin/register">';
          $addPointsLinkSmall = ' href="/admin/addPoints">';
          $pointsTableLinkSmall = ' href="/admin/pointsTable">';

          $registerEndSmall = 'Register';
          $addPointsEndSmall = 'Punkte Hinzufügen';
          $pointsTableEndSmall = 'Punkte Tabelle';

          $requested = $_SERVER['REQUEST_URI'];

          $liStart = '<li class="mdl-menu__item"><a class="navigationLink ';
          $liEnd = '</a></li>';

          if ($requested=="/admin/addPoints"){
            echo $liStart . ' disabledLink">' . $addPointsEndSmall . $liEnd;
            echo $liStart . '"' . $pointsTableLinkSmall . $pointsTableEndSmall . $liEnd;
            echo $liStart . '"' . $registerLinkSmall . $registerEndSmall . $liEnd;
          }
          else if ($requested=="/admin/pointsTable"){
            echo $liStart . '"' . $addPointsLinkSmall . $addPointsEndSmall . $liEnd;
            echo $liStart . ' disabledLink">' . $pointsTableEndSmall . $liEnd;
            echo $liStart . '"' . $registerLinkSmall . $registerEndSmall . $liEnd;
          }
          else if ($requested=="/admin/register"){
            echo $liStart . '"' . $addPointsLinkSmall . $addPointsEndSmall . $liEnd;
            echo $liStart . '"' . $pointsTableLinkSmall . $pointsTableEndSmall . $liEnd;
            echo $liStart . ' disabledLink">' . $registerEndSmall . $liEnd;
          }
          echo '<li class="mdl-menu__item"><a class="navigationLink" href="/admin/logout">Logout</a></li>';
          ?>

        </ul>
      </nav>




      <nav class="mdl-navigation mdl-layout--large-screen-only">
        <?php
        $registerLink = '<a class="mdl-navigation__link" href="/admin/register">Register</a>';
        $addPointsLink = '<a class="mdl-navigation__link" href="/admin/addPoints">Punkte Hinzufügen</a>';
        $pointsTableLink = '<a class="mdl-navigation__link" href="/admin/pointsTable">Punkte Tabelle</a>';

        if ($requested=="/admin/addPoints"){
          echo $pointsTableLink;
          echo $registerLink;
        }
        else if ($requested=="/admin/pointsTable"){
          echo $addPointsLink;
          echo $registerLink;
        }
        else if ($requested=="/admin/register"){
          echo $addPointsLink;
          echo $pointsTableLink;
        }
        echo '<a class="mdl-navigation__link" href="/admin/logout">Logout</a>';
      }
      ?>
    </nav>
  </div>
</header>
<main class="mdl-layout__content">
  <div class="page-content">
