<?php
//right now this is just by date and color
include "../../config/config.php";
include "../../todolist/todolist.class.php";
include "../../includes/site-include.inc.php";

Site::init( $connection );
$Todolist = new Todolist( Site::$userId, $connection );

$date      = !empty($_GET["date"])  ? round((time( ) - strtotime($_GET["date"]))/86400): 0;
$color     = !empty($_GET["color"]) ? "#".$_GET["color"]: "";
$completed = $_GET["completed"]=="true" ? 1: 0; //havascript ajax sends as a string :(
//it *should* show completed items by default

$date 	   = mysqli_escape_string($connection, $date);
$col  	   = mysqli_escape_string($connection, $color); //I CBA to keep the # in the URL query
$items     = $Todolist->get(false, "", $date, $limit=-1, $color=strtoupper($col), $completed); //get all the jobs

$html      = "";
$counter1  = 0;
$counter2  = 0;

if ($items) {
	foreach ($items as $job) { //make the HTML
		$y = $counter2*4;
		$x = ($counter2*4)-1;
		$z = ($counter2*4)-2;
		$a = ($counter2*4)-3;
		$textColor = $job["completed"] ? "green": "black"; //oof ouch owie, 
		$restoreHTML = "";
		
		if ((bool)$counter1%2) { //one in every two should have the 'row' class
			$html .= "<div class=\"row\">";
		}
		if ($job["deleted"]) {
			$restoreHTML = "<i class=\"fas fa-redo-alt\"></i>";
		}
		
		$html .= "<div class=\"col-md-6\">"; 
		$html .= "<div class=\"noShadow cardBorder card\" style=\"border-color: ".htmlspecialchars($job["color"]).";\">";
		$html .= "<div class=\"content\">"; 
		$html .= "<span style=\"color: $textColor\" class=\"title\">".htmlspecialchars(substr($job["due_by"], 0, 10))."
				  <p class=\"makePointer\" style=\"float: right;\" id=".htmlspecialchars((string)$job["id"]).">
				  <i name=\"delete\" id=$y class=\"fas fa-trash-alt theIcon trashcan iPointer\"></i>
				  <i name=\"complete\" id=$z class=\"fas fa-check theIcon complete iPointer\"></i>
				  <i name=\"attachment\" onclick=window.location.href=\"".htmlspecialchars($job["img_location"])."\" name=\"attachment\" id=$x class=\"fas fa-paperclip theIcon attachment iPointer\"></i> 
				  $restoreHTML
				  </p></span>"; //htmlspecialchars the the random img loation incase it snakes us
		$html .= "<div class=\"action\">"; 
		$html .= "<p style=\"color: $textColor\">".htmlspecialchars($job["data"])."</p>"; //always remember to preotect against XSS
		$html .= "</div></div></div></div>";	
		if (!(bool)$counter1%2) {
			$html .= "</div>"; //another div close to close the first row
		}
		++$counter1;
		--$counter2;
	}
	echo $html;
}
