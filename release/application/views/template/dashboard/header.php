<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Digital Signage Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>apple-touch-favicon.png">
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>apple-touch-favicon.png">

        <link href='http://fonts.googleapis.com/css?family=Pathway+Gothic+One' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/normalize.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/dashboard.css">
        <script src="<?php echo base_url(); ?>js/vendor/modernizr-2.6.2.min.js"></script>
        
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div class="fixed-header">
            <?php if(! $this->session->userdata('logged_in')){ } else { echo '<a class="logout" href="logout">Logout</a>'; } ?>
            <a class="viewsite" href="<?php echo base_url(); ?>">View Sigange Page</a>
        </div>

        <header>
            <div class="logo"></div>
        </header>