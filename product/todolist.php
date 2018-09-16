<?php
include "timetable/timetable.class.php";
include "includes/site-include.inc.php";
include "config/config.php";

Site::init( $connection );
$Todolist = new Todolist( (int) Site::$userId ); //implements TodoListInterface

function randomString()
{   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 10; $i++) {
        $randstring .= $characters[rand(0, strlen($characters)-1)];
    }
    return $randstring;
}

function checkDateFormat( $date ) //checks that the date format is YYYY-MM-DD with regex, miss me with that Date::fromFormat str8 shit
//this should only return false if the user tries to make it fail.
{   return (bool) preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date);
}

function checkValidHexColor( $hex ) 
{   return (bool) preg_match("/^[#][0-9A-Za-z]{6}$/", $hex);
}

function validateGETData( )	//verifies that what the user entered is valid and ready to be put into the databse
{	global $filename;
	$filename = ""; //if they didn't upload a file then the path should just be left as an empty string
	if (!isset($_POST["date"]) || !isset($_POST["job"]) || !isset($_POST["jobsubmit"]) || !isset($_POST["jobColor"])){
		return array(false, "");
	}
	if (empty(trim($_POST["date"])) || empty(trim($_POST["job"])) || empty(trim($_POST["jobColor"]))){ 
		return array(false, "Please enter all fields"); //what they entered is empty
	}
	if (!checkDateFormat($_POST["date"])) {
		return array(false, "Please enter the date in the format: 'YYYY-MM-DD'"); //the date is not valid.	
	}
	if (strlen($_POST["job"])>=400) {
		return array(false, "The job that you entered is too long"); //the max val for varchar in the databse is 0xb400
	}
	if (!checkValidHexColor($_POST["jobColor"])) {
		return array(false, "You did not enter a valid color");
	}
	if ($_FILES["uploadTheFile"]["error"]!==4) 
	{	if ($_FILES["uploadTheFile"]["error"]!==UPLOAD_ERR_OK) {
			return array(false, "File upload failed");
		}
		$info = getimagesize($_FILES["uploadTheFile"]["tmp_name"]);
		if (!$info || $info[2]!==IMAGETYPE_PNG) {
			return array(false, "Only png files allowed files allowed"); //if the type cannot be determined then just give them the normal error cus they're probably just doing some fucky shit
		}	
		if ($_FILES["uploadTheFile"]["size"] > 500000) {
			return array(false, "file too big");
		}
		while (file_exists($filename) || empty($filename)) {
			$filename = "uploads/images/".randomString( ).".png"; //make sure that another file with the same name doesn't exist;
		}
		if (!move_uploaded_file($_FILES["uploadTheFile"]["tmp_name"], $filename)) {
			return array(false, "file upload failed");
		}
	}
	return array(true, "");
}

$validGETData = validateGETData( ); //validGETData( ) returns an array of (succeeded, error)
if ($validGETData[0]) //if it didn't fail
{   $Todolist->add($_POST["date"], $_POST["job"], $_POST["jobColor"], $filename); //add it to the database
	$aSuccess = "Your item was added"; //tell the user that it succeeded
	echo "<script> if ( window.history.replaceState ) { window.history.replaceState( null, null, window.location.href ); } </script>"; 
	//this is a trivial solution, but works for now.
} else //if it did fail.
{   if (!empty($validGETData[1])) $aError = $validGETData[1]; //make sure that the error isn't just something that the user might get if they just loaded the page normally
}

$recentJobs = $Todolist->get( false, "", 0, 5 );
$html       = "";
$counter    =  0;
if ($recentJobs)  //make sure that the user has enough todolists to be displayed.
{   foreach ($recentJobs as $job) //make the HTML to list the jobs
	{	$y = $counter*4;
		$x = ($counter*4)-1;
		$z = ($counter*4)-2;
		$a = ($counter*4)-3;
		//<div style=\"display: inline-block; float: right;\" data-toggle=\"tooltip\" title=\"<img src='".$job["img_location"]."' />\">
		$html .= "<div class=\"cardBorder card\" style=\"border-color: ".$job["color"].";\">";
		$html .= "<div class=\"content\">";
		$html .= "<span class=\"title\">".htmlspecialchars(substr($job["due_by"], 0, 10)).
				 "<p class=\"makePointer\" style=\"float: right;\" id=".htmlspecialchars((string)$job["id"]).">
				  <i name=\"delete\" id=$y class=\"fas fa-trash-alt theIcon trashcan iPointer\"></i>
				  <i name=\"edit\" id=$x class=\"fas fa-edit theIcon edit iPointer\"></i>
				  <i name=\"complete\" id=$z class=\"fas fa-check theIcon complete iPointer\"></i>
				  <i onclick=window.location.href=\"".$job["img_location"]."\" name=\"attachment\" id=$a class=\"fas fa-paperclip theIcon attachment iPointer\"></i></p>";	//this has an event listener on it
		$html .= "<div class=\"action\">";
		$html .= "<p id=\"thejob\">".htmlspecialchars($job["data"])."</p>"; //substr to avoid showing the time
		$html .= "</div></div></div>";
		--$counter;
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
		<style>
			* {	cursor: context-menu; }
			input { cursor: auto; }
			.sp-thumb-inner:hover { cursor: pointer; }
		</style>
	</head>
	<body>
		<?php include dirname(__DIR__)."/product/includes/page-top.inc.php"; ?>
		<?php if (isset($aError)) { ?>
			<div class="alert alert-danger"><p><?php echo $aError; ?></p></div>
		<?php } ?>
		<?php if (isset($aSuccess)) { ?>
			<div class="alert alert-success"><p><?php echo $aSuccess ?></p></div>
		<?php } ?>
		<div class="alert alert-success hidden" id="showAjaxSuccess">
		</div>
		<div class="alert alert-danger hidden" id="showAjaxFailure">
		</div>
		<div class="container">
			<noscript>
				<div style="background-color: red;">
					<h1 style="color: white;">This page works much better with javascript enabled</h1>
				</div>
			</noscript>
			<div class="row">
				<div class="col-lg">
					<div class="card">
						<div class="content">
							<span class="title">Add to your todo list</span>
							<div class="action">
								<form action="todolist.php" enctype="multipart/form-data" method="POST">
									<div class="form-group">
										<label for="date">Enter date</label>
										<div class="input-group mb-3">
											<input type="text" style="width: 70%;" class="form-control" id="date" aria-describedby="dateHelp" placeholder="Enter date" disabled required />
											<input name="date" id="hiddenDate" class="hidden"/>
											<div class="input-group-append">
												<span class="input-group-text iPointer" id="basic-addon2"><i class="far fa-calendar-alt iPointer"></i></span>
						  					</div>
			  								<small id="dateHelp" class="form-text text-muted">The date that this has to be done by <p style="color: red; display: inline-block;">Required</p></small>
						  				</div>
						  				<script type="text/javascript"></script>
						  				<script>
						  					$(function() {
						  						$('span[id="basic-addon2"]').daterangepicker({
													singleDatePicker: true,
													showDropdowns: true,
													minYear: 2017,
													maxYear: 2100	//this should  be changed in 2099 to avoid confusing xD
												}, function(start, end, label) {
													$("#hiddenDate").val(start.format("YYYY-MM-DD"))
													$("#date").val(start.format("YYYY-MM-DD"));
											  	});
											});
						  				</script>
									</div>
									<div class="form-group">
										<label for="text">Enter text</label>
										<input type="text" class="form-control" id="doJob" aria-describedby="textHelp" placeholder="Enter what you must do" name="job" required>
										<small id="textHelp" class="form-text text-muted">This is what you have to do <p style="color: red; display: inline-block;">Required</p></small>
									</div>
									<div class="form-group">
										<label for="color" id="chooseColor">Choose your color <div id="showActualColor" class="showColor"></div></label>
										<div class="input-group mb-3">
											<input type="text" style="width: 70%;" class="form-control" id="shownInp" aria-describedby="colorHelp" placeholder="Choose color" disabled required />
											<input type="hidden" value="" id="hideInp" name="jobColor" required />
											<div class="input-group-append">
												<span id="showPallete" class="input-group-text iPointer"><i class="fas fa-palette iPointer"></i></span>
											</div>
											<small id="colorHelp" class="form-text text-muted">Choose your color <p style="color: red; display: inline-block">Required</p></small>
										</div>
									</div>
									<script type="text/javascript">
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
									<div class="form-group">
										<label for="file" id="chooseFile">Choose an image</label>
										<div class="input-group mb-3">
											<input type="text" style="width: 70%;" class="form-control" id="disabledFile" aria-describedby="fileHelp" placeholder="Choose file" disabled required />
											<input type="file" class="hidden" name="uploadTheFile" id="fileUpload" onchange="changeValue(this);" />
											<div class="input-group-append">
												<span class="input-group-text iPointer" id="clickFile"><i class="fas fa-paperclip iPointer"></i></span>
											</div>
											<small id="fileHelp" class="form-text text-muted">Choose your file <p style="display: inline-block; color: rgb(1, 255, 112);">Optional</p></small>
										</div>
									</div>
									<script>
										function changeValue( myFile ) {
											$("#disabledFile").val(myFile.files[0].name);
											console.log(myFile.files[0]);
										}
										$(function(){
											$("#clickFile").click(function(){
												$("#fileUpload").click();
											});
										});
									</script>
									<div class="form-group">
										<button name="jobsubmit" class="btn btn-primary">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg">
					<div id="app">
						<?php echo $html;//see above?>
					</div>
				</div><!--.col-lg-->
			</div><!--.row-->
		</div><!--.container-->
		<script src="assets/js/sendAjaxRequest.js" type="text/javascript"></script>
		<script src="assets/js/handleIcons.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(function(){ 
				let numberOfFiles = document.querySelectorAll(".theIcon");
				for (let i = 0; i>numberOfFiles.length-(numberOfFiles.length*2); --i) { //decrementing loop to avoid colision with IDs is GENIUs
					$("#"+i).tooltip({"trigger":"hover", "placement":"top", "title":$("#"+i).attr("name")});
				}
				$("#doJob").tooltip({"trigger":"focus", "placement":"top", "title":"Must be less than 400 characters"});
			});
		</script>
		<script type="text/javascript">
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>		
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
