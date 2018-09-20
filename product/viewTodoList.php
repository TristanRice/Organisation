<?php
include "todolist/todolist.class.php";
include "includes/site-include.inc.php";
include "config/config.php";

Site::init( $connection );
$Todolist = new Todolist((int) Site::$userId);

$jobs = $Todolist->get(false, "", 0, 10);
$html = "";
$counter1 = 0;
$counter2 = 0;
if ($jobs) {

	foreach ($jobs as $job) {
		$y = $counter2*4;
		$x = ($counter2*4)-1;
		$z = ($counter2*4)-2;
		$a = ($counter2*4)-3;
		if ((bool)$counter1%2) {
			$html .= "<div class=\"row\">";
		}
		$html .= "<div class=\"col-md-6\">"; 
		$html .= "<div class=\"noShadow cardBorder card\" style=\"border-color: ".htmlspecialchars($job["color"]).";\">";
		$html .= "<div class=\"content\">"; 
		$html .= "<span class=\"title\">".htmlspecialchars(substr($job["due_by"], 0, 10))."
				  <p class=\"makePointer\" style=\"float: right;\" id=".htmlspecialchars((string)$job["id"]).">
				  <i name=\"delete\" id=$y class=\"fas fa-trash-alt theIcon trashcan iPointer\"></i>
				  <i name=\"complete\" id=$z class=\"fas fa-check theIcon complete iPointer\"></i>
				  <i name=\"attachment\" onclick=window.location.href=\"".$job["img_location"]."\" name=\"attachment\" id=$x class=\"fas fa-paperclip theIcon attachment iPointer\"></i>
				  </p></span>";
		$html .= "<div class=\"action\">"; 
		$html .= "<p>".htmlspecialchars($job["data"])."</p>";
		$html .= "</div></div></div></div>";	
		if (!(bool)$counter1%2) {
			$html .= "</div>"; //another div close to close the first row
		}
		++$counter1;
		--$counter2;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include dirname(__DIR__)."/product/includes/head.inc.php"; ?>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<!--required scripts for daterangepicker-->
		<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/spectrum.css" />
		<script type="text/javascript" src="assets/js/spectrum.js"></script>
		<script type="text/javascript" src="assets/js/colors.js"></script>
	</head>
	<body>
		<?php include dirname(__DIR__)."/product/includes/page-top.inc.php"; ?>
		<noscript>
			<div style="background: red;">
				<h1 style="color: white;">This page works much better with javascript</h1>
			</div>
		</noscript>
		<div id="filterTheOptions" class="card" style="height: 15%;">
			<div class="content">
				<span class="title">
					Options
				</span>
				<div class="action">
					<div class="form-group">
						<div class="input-group mb-3">
							<input type="text" class="form-control" id="date" aria-describedby="dateHelp" placeholder="Enter date" disabled required />
							<input type="hidden" value="" id="hiddenDate" />
							<div class="input-group-append" id="dateTooltip">
								<span class="input-group-text iPointer" id="basic-addon2"><i class="far fa-calendar-alt iPointer"></i></span>
							</div>
							&nbsp;&nbsp;&nbsp;
							<input placeholder="color" type="text" class="form-control" id="shownInp" disabled>
							<input class="hidden" value="" id="hideInp"/>
							<div class="input-group-append">
								<span class="input-group-text iPointer" id="showPallete"><i class="fas fa-palette iPointer"></i></span>
							</div>
						</div>
						<div class="input-group mb-3">
							<div style="width: 100%;" class="row">
								<div class="col-11">
									<button id="filterbutton" class="form-control btn btn-primary">Filter</button>
								</div>
								<div class="col-1">
									<button class="btn btn-primary form-control" id="advancedOptions"><i class="fas fa-arrow-alt-circle-down" id="adArrow"></i></button>
								</div>
							</div>
						</div>
						<div id="moreOptions" class="input-group hidden">
							<input type="text">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="loading" class="hidden">
			<div class="loader">
			</div>
		</div>
		<div id="content">
			<?php echo $html; ?>
		</div>	
		<!--
		<div>
			<div class="row">
				<div class="col-md-6">
					<div class="noShadow card">
						<div class="content">
							<span class="title">test</span>
							<div class="action">
								<p>adsasdasd</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="noShadow card">
						<div class="content">
							<span class="title">test</span>
							<div class="action">
								<p>asdasds</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="noShadow card">
						<div class="content">
							<span class="title">asdsda</span>
							<div class="action">
								<p>asdadsd</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="noShadow card">
						<div class="content">
							<span class="title">asdasd</span>
							<div class="action">
								<p>adasa</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>-->

		<script type="text/javascript">
			$(function(){
				let numberOfFiles = document.querySelectorAll(".theIcon");
				for (let i = 0; i>numberOfFiles.length-(numberOfFiles.length*2); --i) {
					$("#"+i).tooltip({"trigger":"hover", "placement":"top", "title":$("#"+i).attr("name")});
				}
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#advancedOptions").click(function(){
					let moreOptionsClassList = document.getElementById("moreOptions").classList;
					let moreOptionsButton    = document.getElementById("advancedOptions");
					if (moreOptionsClassList.contains("hidden")){
						$("#filterTheOptions").animate({height: "40%"},"slow");
						moreOptionsClassList.remove("hidden"); //the optiosn shoudl show up after
						moreOptionsButton.innerHTML = "<i class=\"fas fa-arrow-alt-circle-up\"></i>";
					} else {
						moreOptionsClassList.add("hidden"); //the options should dissapear before
						$("#filterTheOptions").animate({height: "20%"});
						moreOptionsButton.innerHTML = "<i class=\"fas fa-arrow-alt-circle-down\"></i>";
					}
					return false;
				});
			});
		</script>
		<script src="assets/js/sendAjaxRequest.js" type="text/javascript"></script>
		<script src="assets/js/handleIcons.js" type="text/javascript"></script>
		<script type="text/javascript">
			$("#filterbutton").click(function(){
				loadingClassList = document.getElementById("loading").classList;
				contentDiv = document.getElementById("content");
				contentDiv.innerHTML = "";
				loadingClassList.remove("hidden"); //start the loader
				$.ajax({
					url   : "/ajax/todolist/getSpecificTodoLists.php",
					cache : false,
					type  : "GET",
					data  : {
						"date":$("#hiddenDate").val( ),
						"color": $("#hideInp").val( )
					},
					success: function(html){
						loadingClassList.add("hidden");
						switch(html){
							case "":  console.log(html); //if it fails
							default: break; //on success
						}
					},
					fail: function(html){
						loadingClassList.add("hidden");
					}
				});
				console.log("here");
	   			return false;
			});
		</script>
		<script type="text/javascript">
			$(function(){
				$('span[id="basic-addon2"]').daterangepicker({
					singleDatePicker: true,
					showDropdowns: true,
					minYear: 2017,
					maxYear: 2100
				}, function(start, end, label){
					$("#date").val(start.format("YYYY-MM-DD"));
					$("#hiddenDate").val(start.format("YYYY-MM-DD"));
				});
			});
		</script>
		<script type="text/javascript">
			//spectrum
			function showColorName( color ) {
				let upperCaseHex = color.toHexString( ).toUpperCase( );
				$("#showActualColor").css("background-color", upperCaseHex);
				$("#shownInp").val(masterList[upperCaseHex]);
				$("#hideInp").val(upperCaseHex);
			}

			$("#showPallete").spectrum({
				showPaletteOnly: true,
				allowEmpty: false,
				cancelText: "Cancel",
				hideAfterPaletteSelect: true,
				change: function(color) {
					showColorName(color);
				},
				palette: [allColors1, allColors2, allColors3, allColors4, allColors5] //ToDo, un-hardcode this.
			});
		</script>
		<script type="text/javascript" src="assets/js/sendAjaxRequest.js"></script>
		<script type="text/javascript">
		</script>
		<script type="text/javascript">
			$(function(){
				$("#showPallete").tooltip ({"trigger":"hover","title":"Choose color"});
				$("#filterbutton").tooltip({"trigger":"hover", "title":"Filter jobs"});
				$("#dateTooltip").tooltip ({"trigger":"hover", "title":"Choose date"});
				$("#advancedOptions").tooltip({"trigger":"hover", "title":"Show advanced options"});
			});
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>		
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>