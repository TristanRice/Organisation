<?php 
include "accounts/user.class.php";
function checkPostData( ) {
	if ($_SERVER["REQUEST_METHOD"]!=="POST") return "";
	if (!isset($_POST["signup"])) return "";
	if (!isset($_POST["email"]) || !isset($_POST["username"]) || !isset($_POST["password"]) || !isset($_POST["password2"])) return "Please enter all fields";
	foreach ($_POST as $key=>$value) 
	{	if (empty(trim($value)) && $key!=="signup") return "Please enter all fields"; }
	if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) return "Please enter a valid email";	//checks that the email is valid
	if (strlen($_POST["username"]) < 3 || strlen($_POST["username"]) > 20) return "Your username must be between 3 and 20 characters"; //verifies that the length of the username is valid
	if ($_POST["password"]!==$_POST["password2"]) return "The passwords that you entered must match";
	if (strlen($_POST["password"]) < 8) return "Your password must be longer than eight characters";
	if (!preg_match("#[0-9]+#", $_POST["password"])) return "Your pasword must contains at laese one number";
	if (!preg_match("#[a-zA-Z]+#", $_POST["password"])) return "Your password must contain one capital and one lowercase character";
	//at this point, all checks have been made, so we should add the password to the database
	$User = new User($_POST["username"], $_POST["password"],$_POST["email"]);
	if (!$User->add( )) return $User->aError; //if there are any errors with the database, this will check it and return an error if there are
	return true;
} 
$y = checkPostData( );
$usrValue = "";
$emailValue = "";
$pass1Value = "";
$pass2Value = "";
if (is_string($y)){
	$errors = $y;
	if (isset($_POST["username"])) $usrValue = $_POST["username"];
	if (isset($_POST["email"])) $emailValue = $_POST["email"];
	if (isset($_POST["password"])) $pass1Value = $_POST["password"];
	if (isset($_POST["password2"])) $pass2Value = $_POST["password2"];
	
} else 
{   session_start( );	
	$_SESSION["username"] = $_POST["username"];
	header("Location: index.php");
}
?>
<!DOCTYPE hmtl>
<html lang="en">
	<head>
		<title>Welcome</title>
		<link rel="stylesheet" href="accounts/loginstyle.css" />
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
		<!-- Bootstrap CSS -->
		<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css' integrity='sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B' crossorigin='anonymous'>
	</head>
	
	<body id="grad">
		<div class="container">
			<div class="login">
				<div class="imgcontainer">
					<p>*Logo will go here*</p>
				</div>
				<?php if (isset($errors) && !empty($errors)) { ?>
					<div class="alert alert-danger">
						<p><?php echo $errors ?> </P>
					</div>
				<?php } ?>
				<form action="signup.php" method="post">
					<label for="username"><b>Username</b></label>
					<input type="text" id="username" value="<?php echo $usrValue; ?>" placeholder="username" autocomplete="off" name="username" required>
					<label for="email"><b>Email</b></label>
					<input type="text" value="<?php echo $emailValue; ?>" placeholder="email" autocomplete="off" name="email" id="email" required>
					<label for="passsword"><b>Password</b></label>
					<input type="password" value="<?php echo $pass1Value; ?>" placeholder="enter your password" autocomplete="off" name="password" id="password" required>
					<label for="password2"><b>Re-enter your password</b></label>
					<input type="password" value="<?php echo $pass2Value; ?>" placeholder="Re-enter your password" autocomplete="off" name="password2" id="password2" required>
					<button style="margin-bottom: 10px; margin-top: 5px;" type="submit" name="signup">Sign up</button>	
					<span class="psw" style="float: left;"><a href="#">Have an account?</a></span>
					<span class="psw"><a href="#">Forgotten password?</a></span>
				</form>
			</div>
		</div>
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

		<script>
			$("#username").tooltip({"trigger":"focus", "title":"Your username must be between 3 and 20 characters"});
			$("#email").tooltip({"trigger":"focus", "title":"You must enter a valid email"});
			$("#password").tooltip({"trigger":"focus", "title":"Your password must be longer than 8 characters, contain a number, and an upper, and lower case character"});
			$("#password2").tooltip({"trigger":"focus", "title":"The password must match"});
		</script>
	</body>
</html>