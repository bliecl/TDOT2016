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
      <nav class="mdl-navigation mdl-layout--large-screen-only">
        <?php
          $registerLink = '<a class="mdl-navigation__link" href="/admin/register">Register</a>';
          $addPointsLink = '<a class="mdl-navigation__link" href="/admin/addPoints">Punkte Hinzufügen</a>';
          $pointsTableLink = '<a class="mdl-navigation__link" href="/admin/pointsTable">Punkte Tabelle</a>';

          $requested = $_SERVER['REQUEST_URI'];
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
          echo '<a class="mdl-navigation__link" href="#">Logout</a>';
          ?>
      </nav>
    </div>
  </header>
  <main class="mdl-layout__content">
    <div class="page-content">
