<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/ico/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap-theme.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/dashboard.css">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="<?php echo base_url(); ?>/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">DigitalSignage</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url(); ?>/index.php/dash">Dashboard</a></li>
                    <li><a href="<?php echo base_url(); ?>/index.php/settings">Settings</a></li>
                    <li><a href="<?php echo base_url(); ?>/index.php/profile">Profile</a></li>
                    <li><a href="https://github.com/painejake/DigitalSignage/issues">Help</a></li>
                    <li><a href="<?php echo base_url(); ?>/index.php/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="<?php echo base_url(); ?>/index.php/dash">Dashboard</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li><a href="<?php echo base_url(); ?>/index.php/create/news">Create a news post</a></li>
                    <li><a href="<?php echo base_url(); ?>/index.php/create/events">Create an event</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li><a href="<?php echo base_url(); ?>/index.php/settings">Settings</a></li>
                    <li><a href="<?php echo base_url(); ?>/index.php/profile">Profile</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li><a href="https://github.com/painejake/DigitalSignage/issues">Help</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Dashboard</h1>
