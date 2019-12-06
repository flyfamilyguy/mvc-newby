<?php
session_start();
// login.php 

/**
 * This script connects to MYSQL using the PDO object.
 * This can be included in web pages where a database connection
 * is needed. 
 * Should be customized to match domains MYSQL database connection details.
 * These details should be available from within domains hosting panel.
 */

// Check if user submitted login info
if ($_SERVER['REQUEST_METHOD'] === "POST") {
	if (isset($_POST['submit'])) {
		
		// MYSQL user account
		define ('MYSQL_USER', 'root');
		// MYSQL password
		define ('MYSQL_PASSWORD', '');
		// Server where MYSQL resides
		define ('MYSQL_HOST', 'localhost');
		// The name of database connecting to
		define ('MYSQL_DATABASE', 'members');
		
		/**
		 * PDO options / configuration details.
		 * Set error mode to "Exceptions".
		 * Turn of emulated prepared statements.
		 */
	$pdoOptions = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_EMULATE_PREPARES => false
		);
		
		/**
		 * Connect to MYSQL and initiate the PDO object.
		 */
		 $pdo = new PDO("mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, //DSN
		 MYSQL_USER, //Username
		 MYSQL_PASSWORD, //Password
		 $pdoOptions //Options
		 );
		 
		 /**
		  * The PDO object can now be used to query MYSQL.
		  * Select information from the database and verify it against given.
		  */
		  
		  $email 	= $_POST['email']; //email entered
		  $password = $_POST['password']; //password entered
		  
		  $sql = "SELECT id, username, email, password FROM credentials WHERE email = :email";
		  $stmt = $pdo->prepare($sql);
		  
		  // Bind statement
		  $stmt->bindValue(':email', $email);
		  
		  //execute
		  $stmt->execute();
		  
		  $user = $stmt->fetch(PDO::FETCH_ASSOC);
		  
		  if ($user === false) {
			  die ("Invalid Email and or Password combination!");
		  }
		  else
		  {
			  $validPassword = password_verify($password, $user['password']);
			  
			  if ($validPassword) {
				  $_SESSION['user_id'] = $user['id'];
				  $_SESSION['user_name'] = $user['username'];
				  $_SESSION['logged_in'] = time();
				  
				  header ('Location: home.html');
				  exit;
			  }
			  else
			  {
				  die ("Incorrect Email and or Password combination!");
			  }
		  }
	}
}
?>

<!DOCTYPE html>
<html lang="en-US">
 <head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome | Please log into your account</title>
<link rel="stylesheet" href="Web\theme\css\app.css">
<style>

</style>
 </head>
<body class="bg">
	<center>
	
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
		
			<table>
			
				<tr>
					<td>
						E-mail:
					</td>
				</tr>
				<tr>
					<td>
						<input type="email" name="email">
					</td>
				</tr>
				<tr>
					<td>
						Password:
					</td>
				</tr>
				<tr>
					<td>
						<input type="password" name="password">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="submit" value="Log In">
					</td>
				</tr>
			
			</table>
		
		</form>
	
	</center>
</body>
</html>