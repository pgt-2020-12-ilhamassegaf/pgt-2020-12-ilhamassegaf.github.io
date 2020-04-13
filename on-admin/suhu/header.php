<?php
include "koneksi.php";
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
    <link rel="icon" href="../../favicon.ico">

    <title>Logger</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">

  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php">Produksi</a>
          <a class="navbar-brand" href="index.php">Suhu</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <div class="navbar-form navbar-right">
			<a href="./../logout.php" type="submit" class="btn btn-success"><i class="fa fa-sign-out"></i> LOGOUT</a>
        	</div>          <ul class="nav navbar-nav">
            <li><a href="../goal.php">Log Produksi</a></li>
            <li><a href="goal.php">Log Suhu</a></li>
              </ul>
      
              
        </div><!--/.nav-collapse -->
      </div>
    </nav>