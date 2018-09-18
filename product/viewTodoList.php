<?php

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
				<h1 style="color: red;">This page works much better with javascript</h1>
			</div>
		</noscript>
		<div class="card">
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
							&nbsp;
							<input placeholder="Color" type="text" class="form-control" id="shownInp" disabled>
							<input class="hidden" value="" id="hideInp"/>
							<div class="input-group-append">
								<span class="input-group-text iPointer" id="showPallete"><i class="fas fa-palette iPointer"></i></span>
							</div>
						</div>
						<button onclick="reloadWithChanges()" id="filterbutton" class="form-control btn btn-primary">Filter</button>
					</div>
				</div>
			</div>
		</div>
		<div id="adsd" class="hidden">
			<div class="loader">
			</div>
		</div>
		<script type="text/javascript">
			$("#filterbutton").click(function(){
				document.getElementById("adsd").classList.remove("hidden"); //start the loader
				$.ajax({
					url   : "/ajax/todolist/getSpecificTodoLists.php",
					cache : false,
					type  : "GET",
					data  : {
						"date":$("#adada").val( ),
						"color": $("#adsaasdasd").val( )
					},
					success: function(html){
						document.getElementById("adsd").classList.add("hidden");
						switch(html){
							case "": break; //if it fails
							default: break; //on success
						}
					},
					fail: function(html){
						//Todo: show an error message here
					}
				});
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
			});
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>		
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>