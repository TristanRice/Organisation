<?
include "timetable/timetable.class.php";
include "includes/site-include.inc.php";
include "config/config.php";
Site::init( $connection );

set_error_handler('exceptions_error_handler');

function exceptions_error_handler($severity, $message, $filename, $lineno) {
  if (error_reporting() == 0) {
    return;
  }
  if (error_reporting() & $severity) {
    throw new ErrorException($message, 0, $severity, $filename, $lineno);
  }
}

$days = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
$html = "";
$TimeTable = new TimeTable(Site::$userId);
$subjects = $TimeTable->getAll( );
$counter1 = 0;
print_r($subjects);
for ($i = 0; $i<7; $i++) {
	$html .= "<li class=\"day\" id=\"".(int)($i+1)."\"><span class=\"name\">".$days[$i]."</span>";
	$counter = 0;
	for ($j = 8; $j<24; $j++) {
		$inner = "";
		if (array_key_exists($counter1, $subjects)) {
			if ($subjects[$counter1]["day"]==$i && $subjects[$counter1]["time"]==($j-8)) {
				++$counter1;
				$inner.=$subjects[$counter1]["subject"];
			}
		}
		$html .= "<div id=\"".$counter."\" class=\"boxbox hour hour__".str_pad($j,2,'0',STR_PAD_LEFT)." hour--two\">$inner</div>";
		++$counter;
	}
	$html .= "</li>";
}
?>
<!DOCTYPE html>
<html lang="en">
		<?php include "includes/head.inc.php"; ?> 
		<link rel="stylesheet" href="timetable/timetable.style.css" />
		<title>TimeTable</title>
		<?php include "includes/page-top.inc.min.php"; ?>
		<header>
			<div id="container">
				<div class="boxy holdertopDivHour class1" id="draggable" draggable="true">Mathematics</div>
				<div class="boxy holdertopDivHour class3" id="draggable1" draggable="true">Spanish</div></div></header>
		<section class="timetable">
			<ol class="timings"><li><time datetime="08:00">0800</time></li><li>0900</li><li>1000</li><li>1100</li><li>1200</li><li>1300</li><li>1400</li><li>1500</li><li>1600</li><li>1700</li></ol><ol class="week"><?php echo $html ?></ol></section>
		<script type="text/javascript" src="assets/js/sendAjaxRequest.js"></script>
		<script type="text/javascript" src="assets/js/dragAndDrop.js"></script>
		<script type="text/javascript" src=""></script>
	<?php include "includes/page-bottom.inc.php";?>
</html>