<html>
    <!-- Testing -->
	<head>
		<link rel="stylesheet" type="text/css" href="/styles.css" media="screen"/>
	</head>
	<body>
		<div id="container">
			<div id="logo">
				<img src="/images/ey-wordmark.png">
			</div>
			<div id="content">
				
				<h2>Seriously, how easy was that?!</h2>

				<p>This is just a simple bit of code, deployed from a <a href="https://github.com/engineyard/howto">repository on GitHub</a> and a <strong>master</strong> branch to show you how  you can be quickly up and running.</p>
				
				<h2>Test data from <a href="http://php.net/">PHP</a></h2>
				<p>
				<?php
                    $version = phpversion();
					echo "<p>Your app is running on PHP version: " . $version . "<br/></p>";
					echo "<p>The app IP is: " . $_SERVER['SERVER_ADDR'] . "<br/></p>";
					// Solos will return a remote_addr correctly,
					// HAProxy passes client IP using the X_Forwarded_For header
					if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
						$client_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
					} else {
						$client_ip = $_SERVER['REMOTE_ADDR'];
					}
					echo "<p>The client IP is : " . $client_ip . "<br/></p>";
					echo "<p>Temp dir available to your app is: " . sys_get_temp_dir() . "</p>";
				?>
				</p>
				<h2>Code from above</h2>
<?php
$code = highlight_string('
<?php
	$version = phpversion();
	$ip = $_SERVER["SERVER_ADDR"];
	$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	$temp = sys_get_temp_dir();
?>',1);
echo $code;
?>

				<?php
				// Attempt to connect to a preconfigured MySQL server.
				if (getenv('DB_HOST')) {
					// Make sure we have the necessary environment variables..
					$db_vars = array('DB_HOST', 'DB_USER', 'DB_PASS', 'DB_DATABASE');
					$db_vars_ok = true;
					foreach ($db_vars as $db_var) {
						if (!getenv($db_var)) {
							$db_vars_ok = false;
							break;
						}
					}

					if ($db_vars_ok) {
						echo "<h2>MySQL</h2>";
						echo "<p>MySQL has been configured and the following environment variables contain the connection details:</p>";
						echo "<ul>";
						foreach ($db_vars as $db_var) {
							echo "<li><code>$db_var=" . ($db_var == 'DB_PASS' ? '*********' : getenv($db_var)) . "</code></li>";
						}
						echo "</ul>";
						$mysql = new mysqli(
							getenv('DB_HOST'),
							getenv('DB_USER'),
							getenv('DB_PASS'),
							getenv('DB_DATABASE')
						);
						if ($mysql->connect_errno) {
							echo "<p>Error connecting to MySQL: " . $mysql->connect_error . "</p>";
						} else {
							echo "<p>A connection was successfully made to MySQL using the details above.</p>";
						}
					}
				}
				?>
			<div>
		</div>
	</body>
</html>