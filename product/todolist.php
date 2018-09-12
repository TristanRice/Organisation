<?php
include "timetable/timetable.class.php";
include "includes/site-include.inc.php";
include "config/config.php";

Site::init( $connection );
$Todolist = new Todolist( (int) Site::$userId ); //implements TodoListInterface

$recentJobs = $Todolist->get( false, "", 0, 5 );
$html = "";
$counter = 0;
if (sizeof($recentJobs)>0)  //make sure that the user has enough todolists to be displayed.
{   foreach ($recentJobs as $job) //make the HTML to list the jobs
	{	$html .= "<div class=\"card\" stlye=\"width: 100%;\">";
		$html .= "<div class=\"content\">";
		$html .= "<span class=\"title\">".htmlspecialchars($job["data"])."<p class=\"makePointer\" style=\"float: right;\" id=".(string)$counter."><i name=\"delete\" class=\"fas fa-trash-alt\"></i> <i name=\"edit\" class=\"fas fa-edit\"></i></p>";	//this has an event listener on it
		$html .= "<div class=\"action\">";
		$html .= "<p id=\"thejob\">".htmlspecialchars($job["due_by"])."</p>";
		$html .= "</div></div></div>";
		++$counter; //make sure to increment the ID
	}
}

function checkDateFormat( $date ) //checks that the date format is YYYY-MM-DD with regex, miss me with that Date::fromFormat str8 shit
//this should only return false if the user tries to make it fail.
{   return (bool) preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date);
}

function validateGETData( )	//verifies that what the user entered is valid and ready to be put into the databse
{	if (!isset($_GET["date"]) || !isset($_GET["job"]) || !isset($_GET["jobsubmit"])) return array(false, "");
	if (empty(trim($_GET["date"])) || empty(trim($_GET["job"]))) return array(false, "Please enter all fields"); //what they entered is empty
	if (!checkDateFormat($_GET["date"])) return array(false, "Please enter the date in the format: 'YYYY-MM-DD'"); //the date is not valid.	
	if (strlen($_GET["job"])>=400) return array(false, "The job that you entered is too long"); //the max val for varchar in the databse is 0xb400
	
	return array(true, "");
}

$validGETData = validateGETData( ); //validGETData( ) returns an array of (succeeded, error)
if ($validGETData[0]) //if it didn't fail
{   $Todolist->add($_GET["date"], $_GET["job"]); //add it to the database
	$aSuccess = "Your item was added"; //tell the user that it succeeded
} else //if it did fail.
{   if (!empty($validGETData[1])) $aError = $validGETData[1]; //make sure that the error isn't just something that the user might get if they just loaded the page normally
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
	</head>
	<body>
		<noscript>
			<div style="background-color: red;"><h1 style="color: white;">This page works much better with javascript enabled</h1></div>
		</noscript>
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
			<div class="row">
				<div class="col-lg">
					<div class="card">
						<div class="content">
							<span class="title">Add to your todo list</span>
							<div class="action">
								<form action="todolist.php" method="GET">
									<div class="form-group">
										<label for="date">Enter date</label>
										<div class="input-group mb-3">
											<input type="text" style="width: 70%;" class="form-control" id="date" aria-describedby="dateHelp" placeholder="Enter date" disabled required>
											<input type="hidden" name="date" id="hiddenDate" />
											<div class="input-group-append">
						    					<span class="input-group-text" id="basic-addon2"><i class="far fa-calendar-alt"></i></span>
						  					</div>
			  								<small id="dateHelp" class="form-text text-muted">The date that this has to be done by</small>
						  				</div>
						  				<script>
						  					//if the user has javavscript enabled then load in the normal text box
						  					let hiddenDiv = document.getElementById("unhide");
						  					hiddenDiv.classList.remove("hidden");
						  				</script>
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
										<input type="text" class="form-control" id="date" aria-describedby="textHelp" placeholder="Enter what you must do" name="job" required>
										<small id="textHelp" class="form-text text-muted">This is what you have to do</small>
									</div>
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
						<?php echo $html; //see above?>
					</div>
				</div><!--.col-lg-->
			</div><!--.row-->
		</div><!--.container-->
		<script>
			document.addEventListener('DOMContentLoaded', function(){
				//add an event listener to the containing div
				let app = document.getElementById("app");
				//attaches an event listener to the whole div
				allFiles = {};
				function writeToArray( url, data )
				{   allFiles["url"]  = url;
					allFiles["data"] = data;
				}
				app.addEventListener("click", function(e){
					let parentNode = e.target.parentNode; //the element that the user clicks
					if (e.target && parentNode.nodeName === "P" && (parentNode.id>=0 && parentNode.id <5)) {
						switch (e.target.getAttribute("name")) 
						{	case "edit"   : writeToArray("ajax/todolist/editTodoList.php", {"editing":"", "edited":"", "id":parentNode.id});
							case "delete" : writeToArray("ajax/todolist/deleteTodoList.php", {"id":parentNode.id});
						}
						$.ajax({
							url   : allFiles.url, //
							cache : false,
							type  : "GET",
							data  : allFiles.data,
							success: function(html){
								switch (html)
								{   case "": parentNode.parentNode.parentNode.parentNode.classList.add("hidden"); //Just add the hidden class to the div, the next time the page loads it will display new ones. 
									defalt: //make error here
								}
							},
							fail: function(html){
								//Todo: show an error message here
							}
						});
					}
				});
			});
		</script>
	</body>
</html>
