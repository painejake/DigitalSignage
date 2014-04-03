<?php

error_reporting(0); //Setting this to E_ALL showed that that cause of not redirecting were few blank lines added in some php files.

$db_config_path = '../application/config/database.php';

// Only load the classes in case the user submitted the form
if($_POST) {

	// Load the classes and create the new objects
	require_once('includes/core_class.php');
	require_once('includes/database_class.php');

	$core = new Core();
	$database = new Database();


	// Validate the post data
	if($core->validate_post($_POST) == true)
	{

		// First create the database, then create tables, then write config file
		if($database->create_database($_POST) == false) {
			$message = $core->show_message('error',"The database could not be created, please verify your settings.");
		} else if ($database->create_tables($_POST) == false) {
			$message = $core->show_message('error',"The database tables could not be created, please verify your settings.");
		} else if ($core->write_config($_POST) == false) {
			$message = $core->show_message('error',"The database configuration file could not be written, please chmod application/config/database.php file to 777");
		}

		// If no errors, redirect to registration page
		if(!isset($message)) {
		  $redir = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
      $redir .= "://".$_SERVER['HTTP_HOST'];
      $redir .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
      $redir = str_replace('install/','',$redir);
      		// sleep to allow querys to complete
      		sleep(2); 
			header( 'Location: ' . $redir . 'index.php/dash' );
		}

	}
	else {
		$message = $core->show_message('error','Not all fields have been filled in correctly. The host, username, password, and database name are required.');
	}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../favicon.ico">

    <title>DigitalSignage Installer</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/install.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
    	<?php if(is_writable($db_config_path)){?>

		<?php if(isset($message)) {echo '<p class="error">' . $message . '</p>';}?>

		<form id="install_form" class="form-signin" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

			<h2 class="form-signin-heading">Installation <small>MySQL Settings</small></h2>

			<p>Your username and password for the dashboard will be <strong>admin</strong> and <strong>password</strong> when the installation in complete.</p>
			<div class="alert alert-info text-center"><p>Please delete the install folder after installation.</p></div>

			<p><input type="text" id="hostname" value="localhost" class="form-control" name="hostname" placeholder="MySQL Hostname" required></p>
			<p><input type="text" id="username" class="form-control" name="username" placeholder="MySQL Username" autocomplete="off" required autofocus></p>
			<p><input type="password" id="password" class="form-control" name="password" placeholder="MySQL Password" autocomplete="off" required></p>
			<p><input type="text" id="database" class="form-control" name="database" placeholder="MySQL Database" autocomplete="off" required></p>
			<button onclick="return confirm('This will drop the current signage tables. Continue?');" class="btn btn-lg btn-primary btn-block" type="submit" value="Install">Install</button>

		</form>

		<hr>

		<p class="text-center"><a href="https://github.com/painejake/DigitalSignage">DigitalSignage on Github</a></p>

	  <?php } else { ?>
      <p class="error">Please make the application/config/database.php file writable. <strong>Example</strong>:<br /><br /><code>chmod 777 application/config/database.php</code></p>
	  <?php } ?>
    
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>