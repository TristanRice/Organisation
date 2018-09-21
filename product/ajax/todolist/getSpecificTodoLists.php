<?php
//right now this is just by date and color
include "../../config/config.php";
include "../../todolist/todolist.class.php";
include "../../includes/site-include.inc.php";

Site::init( $connection );
$Todolist = new Todolist( Site::$userId, $connection );

if (!isset($_GET["date"]) || !isset($_GET["color"])) {
	//don't show error message here because they'll just be clicking the button randomly
	echo "";
	die( );
}
$days 	  = time( ) - strtotime($_GET["date"]); //work out the time in seconds
$datediff = round($days/86400); //fet the days since today's date and the date the user enterd
$datediff = mysqli_escape_string($connection, $datediff); //even though it won't be an issue, escape it anyway
$date 	  = mysqli_escape_string($connection, $_GET["date"]);
$col  	  = "#".mysqli_escape_string($connection, $_GET["color"]); //I CBA to keep the # in the URL query
$items    = $Todolist->get(false, "", $datediff, $limit=-1, $color=strtoupper($col), true); //get all the jobs
$html     = "";
$counter1 = 0;
$counter2 = 0;
if ($items) {

	foreach ($jobs as $job) { //make the HTML
		$y = $counter2*4;
		$x = ($counter2*4)-1;
		$z = ($counter2*4)-2;
		$a = ($counter2*4)-3;
		if ((bool)$counter1%2) { //one in every two should have the 'row' class
			$html .= "<div class=\"row\">";
		}
		$html .= "<div class=\"col-md-6\">"; 
		$html .= "<div class=\"noShadow cardBorder card\" style=\"border-color: ".htmlspecialchars($job["color"]).";\">";
		$html .= "<div class=\"content\">"; 
		$html .= "<span class=\"title\">".htmlspecialchars(substr($job["due_by"], 0, 10))."
				  <p class=\"makePointer\" style=\"float: right;\" id=".htmlspecialchars((string)$job["id"]).">
				  <i name=\"delete\" id=$y class=\"fas fa-trash-alt theIcon trashcan iPointer\"></i>
				  <i name=\"complete\" id=$z class=\"fas fa-check theIcon complete iPointer\"></i>
				  <i name=\"attachment\" onclick=window.location.href=\"".htmlspecialchars($job["img_location"])."\" name=\"attachment\" id=$x class=\"fas fa-paperclip theIcon attachment iPointer\"></i> 
				  </p></span>"; //htmlspecialchars the the random img loation incase it snakes us
		$html .= "<div class=\"action\">"; 
		$html .= "<p>".htmlspecialchars($job["data"])."</p>"; //always remember to preotect against XSS
		$html .= "</div></div></div></div>";	
		if (!(bool)$counter1%2) {
			$html .= "</div>"; //another div close to close the first row
		}
		++$counter1;
		--$counter2;
	}
	echo $html;
}
