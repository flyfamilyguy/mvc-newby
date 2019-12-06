<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
	if (isset($_POST['submit'])) {
		$firstname = $_POST['firstname'];
		$lastname  = $_POST['lastname'];
		$email 	   = $_POST['email'];
		$username  = $_POST['username'];
		$password  = password_hash($_POST['password'], PASSWORD_DEFAULT);
		
		$host   = "localhost";
		$user   = "root";
		$pword  = "";
		$dbname = "members";
		
		try {
			$pdo = new PDO('mysql:host=localhost;dbname=members','root','');
		}catch (PDOException $exc) {
			echo $exc->getMessage();
			exit();
		}
		
		$query = "INSERT INTO `credentials` (`firstname`, `lastname`, `email`, `username`, `password`)
		 VALUES(:firstname, :lastname, :email, :username, :password)";
		 
		$result = $pdo->prepare($query);
		$exec = $result->execute(array(':firstname' => $firstname, ':lastname' => $lastname, ':email' => $email,
		':username' => $username, ':password' => $password));
		
		// Check success 
		if ($exec) {
			header ('Location: login.php');
		}
		else
		{
			echo "<p style='color:red'>Failed to insert data!</p>";
		}
    }
}
?>

<!DOCTYPE html>
<html lang ="en-US">
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Member Sign Up</title>
<link rel="stylesheet"
      href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.16.2/build/styles/default.min.css">
<link rel="stylesheet" href="Web\theme\css\app.css">
<style>

</style>
<script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.16.2/build/highlight.min.js"></script>
<script
 charset="UTF-8"
 src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.9/languages/go.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
	</head>
<body class="bg">

	<center>
	
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
		
		<table>
			
			<tr>
				<td>
					<p>First Name:</p>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="firstname">
				</td>
			</tr>
			<tr>
				<td>
					<p>Last Name:</p>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="lastname">
				</td>
			</tr>
			<tr>
				<td>
					<p>E-mail:</p>
				</td>
			</tr>
			<tr>
				<td>
					<input type="email" name="email">
				</td>
			</tr>
			<tr>
				<td>
					<p>User Name:</p>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="username">
				</td>
			</tr>
			<tr>
				<td>
					<p>Password:</p>
				</td>
			</tr>
			<tr>
				<td>
					<input type="password" name="password">
				</td>
			</tr>
			<tr>
				<td>
					<p>Verify Password</p>
				</td>
			</tr>
			<tr>
				<td>
					<input type="password" name="pwordverify">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="Sign Up">
				</td>
			</tr>
			
		</table>
		
		</form>
		
		<div>
		
			<pre>
			
				<code class="php">
				
					
/**
 * register.php
 *
 * A functional user registration form written in PHP.
 * After gathering a new users information requirements,
 * this script connects to the domains MYSQL database then
 * creates a new PDO object.
 */ 
					
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
if (isset($_POST['submit'])) {
	
$firstname = $_POST['firstname'];
$lastname  = $_POST['lastname'];
$email = $_POST['email'];
$username  = $_POST['username'];
$password  = password_hash($_POST['password'], PASSWORD_DEFAULT);
		
$host   = "localhost";
$user   = "root";
$pword  = "";
$dbname = "members";
		
try {
$pdo = new PDO('mysql:host=localhost;dbname=members','root','');
}catch (PDOException $exc) {
echo $exc->getMessage();
exit();
}
		
$query = "INSERT INTO `credentials` (`firstname`, `lastname`, `email`, `username`, `password`)
VALUES(:firstname, :lastname, :email, :username, :password)";
	 
$result = $pdo->prepare($query);
$exec = $result->execute(array(':firstname' => $firstname, ':lastname' => $lastname, ':email' => $email,
':username' => $username, ':password' => $password));
	
// Check success 
if ($exec) {
header ('Location: login.php');
		}
else
{
echo "<p style='color:red'>Failed to insert data!</p>";
}
}
}

				
				</code>
			
			</pre>
		
		</div>
	
	</center>

</body>
</html>