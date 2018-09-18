<?php
include "timetable/timetable.class.php";
include "includes/site-include.inc.php";
include "config/config.php";
Site::init( $connection );

$days = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
$html = "";
$TimeTable = new TimeTable(Site::$userId);
$subjects = $TimeTable->getAll( );
usort($subjects, function($a, $b) { //make sure taht the array is sorted properly
	$c = $a["day"] - $b["day"];
	$c.= $a["time"] - $b["time"];
	return $c;
});
$duplicate1 = array( );
$newSubj = array( );
foreach ($subjects as $subject){ //make sure that there are no duplicates.
	if (!empty($duplicate1) && $duplicate1==array($subject["day"],$subject["time"])){
		continue;
	}
	$newSubj[] = $subject;
	$duplicate1 = array($subject["day"], $subject["time"]);
}
$subjects = $newSubj;
$counter1 = 0;
for ($i = 0; $i<7; $i++) {
	$html .= "<li class=\"day\" id=\"".(int)($i+1)."\"><span class=\"name\">".$days[$i]."</span>";
	$counter = 0;
	for ($j = 8; $j<24; $j++) {
		$inner = "";
		$background = "#FFFFFF";
		if (array_key_exists($counter1, $subjects)) {
			if ($subjects[$counter1]["day"]==($i+1) && $subjects[$counter1]["time"]==($j-8)) {
				$background = $subjects[$counter1]["color"];
				$inner .= "<p style='color: black;'>".$subjects[$counter1]["subject"]."</p>";
				++$counter1;
			}
		}
		$html .= "<div style=\"background: ".$background."\" id=\"".$counter."\" class=\"boxbox hour hour__".str_pad($j,2,'0',STR_PAD_LEFT)." hour--two\">$inner</div>"; //using strpad for 08 and 09
		++$counter;
	}
	$html .= "</li>";
}

/*How the above works
Since I didn't want to loop through the subjects array every iteration of the loop, I simply used a system whereby
a counter would be incrememnted everytime there was a new timetable entry. Basically, everytime that a new div for the 
tiemtable is added to the html, if the day and time of the timetable entry for the database match the $i and $j of each loop,
then it will add the subject text into the new div, and then increment the counter to start waiting on the next index 
of the array to match $i and $j
*/
?>
<!DOCTYPE html>
<html lang="en">
		<?php include "includes/head.inc.php"; ?> 
		<link rel="stylesheet" href="timetable/timetable.style.css" />
		<title>TimeTable</title>
		<?php include "includes/page-top.inc.min.php"; ?>
		<header>
			<div id="container">
				<div style="background: #3498db;" class="boxy holdertopDivHour" id="draggable" draggable="true">Maths</div>
				<div style="background: #e74c3c;" class="boxy holdertopDivHour" id="draggable1" draggable="true">Spanish</div></div></header>
		<section class="timetable">
			<ol class="timings"><li><time datetime="08:00">0800</time></li><li>0900</li><li>1000</li><li>1100</li><li>1200</li><li>1300</li><li>1400</li><li>1500</li><li>1600</li><li>1700</li></ol><ol class="week"><?php echo $html ?></ol></section>
		<script type="text/javascript" src="assets/js/sendAjaxRequest.js"></script>
		<script type="text/javascript" src="assets/js/dragAndDrop.js"></script>
		<script type="text/javascript" src=""></script>
	<?php include "includes/page-bottom.inc.php";?>
</html>