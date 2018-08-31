<?php
include "accounts/user.class.php"; 
session_start( );
function validateUser( ) {
	if ($_SERVER["REQUEST_METHOD"]!=="POST") return "";
	if (!isset($_POST["loginSubmit"])) return "";
	if (!isset($_POST["username"]) || !isset($_POST["password"])) return "Please enter all fields";
	if (empty(trim($_POST["username"])) || empty(trim($_POST["password"]))) return "Please enter all fields";
	$User = new User($_POST["username"], $_POST["password"]);
	return $User->login( );
}
	
$username = "";
$password = "";
$validated = validateUser( );
if (!is_string($validated) && $validated)
//if the details that the user entered were correct, start a session and redirect
{	$_SESSION["username"] = $_POST["username"];
	header("Location: index.php");
} else 
{	if (is_string($validated))
	//if a string was returned from validateUser then taht should be the error message shown 
	{   $error = $validated; }	
	else
	//if a false boolean value was returned then it sould ask them to try again
	{   $error = "Incorrect username/password combination, please try again later"; }
	//finally, we should 
	if (isset($_POST["username"])) $username = $_POST["username"];
	if (isset($_POST["password"])) $password = $_POST["password"];
}
?>

<!DOCTYPE html>
<html lang="en" class="htmlRestPassword1">
	<head>
		<title>Welcome</title>
		<link rel="stylesheet" href="accounts/loginstyle.css" />
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
		<!-- Bootstrap CSS -->
		<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css' integrity='sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B' crossorigin='anonymous'>
	</head>
	<body id="grad" style="height: 100%;" >
		<div class="container">
			<div class="login">
				<?php if (isset($error) && !empty($error)) { ?>
					<div class="alert alert-danger">
						<p><?php echo $error ?></p>
					</div>
				<?php } ?>
				<div class="imgcontainer">
					<p>Logo will go here</p>
				</div>
				<form action="login.php" method="post">
					<label for="uname"><b>Username</b></label>
					<input type="text" value="<?php echo $username; ?>" placeholder="Username" name="username" id="uname" required>
					<label for="pswd"><b>Password</b></label>
					<input type="password" value="<?php echo $password ?>" placeholder="password" name="password" id="pswd" required>
					<button type="submit" name="loginSubmit">Login</button>
				</form>
			</div>
		</div>
	</body>
</html>