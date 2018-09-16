<?php
include "includes/site-include.inc.php";
include "config/config.php";
include "messages/messages.class.php";

Site::init( $connection );

$Messages = new Message( Site::$userId );

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include "includes/head.inc.php"; ?>
		<meta charset="UTF-8" />
		<style>
			html {
				background-color: #f5f5f5;
			}
		</style>
	</head>
	<body>
		<?php include "includes/page-top.inc.php"; ?>
		<div class="row" style="background-color: #f5f5f5; height: 80vh;">
			<div class="col-sm-2">
				<div class="showFriend">
					<p>Hello world</p>
				</div>
			</div>
			<div class="col-sm-10">
				<div style="margin-right: 20px;">
					<div class="fromSame message">
						<span class="title">Adadsadads</span>
						<p class="messageContent">adsadsasd</p>
					</div>
					<div class="other message">
						<span class="title">AaA</span>
						<p class="messageContent">adsadsasd</p>
					</div>
				</div>
				<div class="msgSend">
					<input type="text" style="width: 70%;" class="form-control" id="date" aria-describedby="dateHelp" placeholder="Enter date" required />
				</div>
			</div>
		</div>
		<?php include "includes/page-bottom.inc.php"; ?>
	</body>
</html>