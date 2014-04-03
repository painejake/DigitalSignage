<?php header('X-UA-Compatible: IE=edge,chrome=1');

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'show_help_link' LIMIT 1");

foreach ($s_q->result() as $row) {
   $show_help_link = $row->value;
} ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>apple-touch-favicon.png">

    <title>DigitalSignage - Dashboard</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-theme.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/dashboard.css">

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

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
                    <li><a href="<?php echo site_url("dash"); ?>">Dashboard</a></li>
                    <li><a href="<?php echo site_url("settings"); ?>">Settings</a></li>
                    <li><a href="<?php echo site_url("profile"); ?>">Profile</a></li>
                    <?php if ($show_help_link == 1)  : echo '<li><a href="https://github.com/painejake/DigitalSignage/issues">Help</a></li>'; endif; ?>

                    <li><a href="<?php echo site_url("logout"); ?>">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li <?php if (current_url() == site_url("dash"))  : echo 'class="active"'; endif; ?>><a href="<?php echo site_url("dash"); ?>">Dashboard</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li <?php if (current_url() == site_url("create/news"))  : echo 'class="active"'; endif; ?>><a href="<?php echo site_url("create/news"); ?>">Create a news post</a></li>
                    <li <?php if (current_url() == site_url("create/events"))  : echo 'class="active"'; endif; ?>><a href="<?php echo site_url("create/events"); ?>">Create an event</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li <?php if (current_url() == site_url("settings"))  : echo 'class="active"'; endif; ?>><a href="<?php echo site_url("settings"); ?>">Settings</a></li>
                    <li <?php if (current_url() == site_url("profile"))  : echo 'class="active"'; endif; ?>><a href="<?php echo site_url("profile"); ?>">Profile</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <?php if ($show_help_link == 1)  : echo '<li><a href="https://github.com/painejake/DigitalSignage/issues">Help</a></li>'; endif; ?>
                    
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Dashboard</h1>
