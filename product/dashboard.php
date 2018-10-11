<!DOCTYPE html>
<html lang="en">
	<head>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<style>

			* {
				margin: 0;
			}

			html, body {
				height: 100%;
				background-color: #f5f5f5;
			}

			.hidden {
				display: none;
			}

			.row1{
				background-color: orange;
			}

			.row2{
				background-color: blue;
			}

			.container-fluid {
				display: flex;
				flex-direction: column;
				height: 100%;
			}

			.row:last-child {
	  			flex: 1;
			}

			.icon:hover {
				cursor: pointer;
			}

			.icon_other:hover {
				color: blue;
			}

			.icon_hamburger:hover {
				color: red;
			}

			.icon_paperclip:hover {
				color: purple;
			}

			.icon_pen:hover {
				color: lightblue;
			}

			.spinner {
				width: 40px;
				height: 40px;
				background-color: #333;

				margin: 10px auto;
				-webkit-animation: sk-rotateplane 1.2s infinite ease-in-out;
				animation: sk-rotateplane 1.2s infinite ease-in-out;
			}

			@-webkit-keyframes sk-rotateplane {

				0% { 
					-webkit-transform: perspective(120px) 
				}
				
				50% { 
					-webkit-transform: perspective(120px) rotateY(180deg) 
				}
				
				100% { 
					-webkit-transform: perspective(120px) rotateY(180deg)  rotateX(180deg) 
				}
			}

			@keyframes sk-rotateplane {

  				0% { 
					transform: perspective(120px) rotateX(0deg) rotateY(0deg);
					-webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg) 
  				}
  				
  				50% { 
					transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
					-webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg) 
 				}
 				
 				100% { 
					transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
					-webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
  				}
			}

			.loading_line {
				width: 30%;
				height: 40px;
				text-align: center;
				margin: 10px auto;			
			}

			.small_card {
				width: 50%;
				margin-top: 5px;
			}

			.cardContainer {
				display: flex;
				flex-wrap: wrap;
				flex-flow: row wrap;
				justify-content: space-around;
			}

			.cardClass {
				margin-top: 5px;
				flex: 1 0 40%;
				height: 150px;
			}

			.cardClass:hover {
				cursor: pointer;
			}

			.carClass:nth-child(odd) {
				margin-left: 5px;
			}

			.animateDiv {
				-webkit-transition: all 0.5s ease;
				-moz-transition: all 0.5s ease;
   			 	-o-transition: all 0.5s ease;
				transition: all 0.5s ease;
			}

			.rotate {
				-moz-transition: all 0.25s linear;
				-moz-transform: all 0.25s linear;
				transition: all 0.25s linear;
			}

			.rotate.down {
				-ms-transform: rotate(180deg);
				-moz-transform: rotate(180deg);
				-webkit-transform: rotate(180deg);
				transform: rotate(180deg);
			}

			#sidebar {
			    min-width: 250px;
			    max-width: 250px;
			    height: 100vh;
			    position: fixed;
			    top: 0;
			    left: 0;
			    /* top layer */
			    z-index: 9999;
			}

			.overlay {
			    display: none;
			    position: fixed;
			    /* full screen */
			    width: 100vw;
			    height: 100vh;
			    /* transparent black */
			    background: rgba(0, 0, 0, 0.7);
			    /* middle layer, i.e. appears below the sidebar */
			    z-index: 998;
			    opacity: 0;
			    /* animate the transition */
			    transition: all 0.5s ease-in-out;
			}
			/* display .overlay when it has the .active class */
			.overlay.active {
			    display: block;
			    opacity: 1;
			}

			#dismiss {
			    width: 35px;
			    height: 35px;
			    position: absolute;
			    /* top right corner of the sidebar */
			    top: 10px;
			    right: 10px;
			}
		</style>
		<title>Dashboard</title>
	</head>
	<body>
		

		<!--sidebar-->
		<nav id="sidebar">
			<div id="dismiss">
				<i class="fas fa-arrow-left"></i>
			</div>
				<div class="sidebar-header">
				<h3>Sidebar header</h3>
			</div>

			<ul class="list-unstyled components">
				<p>Heading</p>
				<li class="active">
					<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Home</a>
	            	<ul class="collapse list-unstyled" id="homeSubmenu">
	               		<li>
	                    	<a href="#">Home 1</a>
	                	</li>
	                	<li>
	                    	<a href="#">Home 2</a>
	                	</li>
	                	<li>
	                    	<a href="#">Home 3</a>
	                	</li>
	            	</ul>
		        </li>
		        <li>
		            <a href="#">About</a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
		            <ul class="collapse list-unstyled" id="pageSubmenu">
		                <li>
		                    <a href="#">Page 1</a>
		                </li>
		                <li>
		                    <a href="#">Page 2</a>
		                </li>
		                <li>
		                    <a href="#">Page 3</a>
		                </li>
		            </ul>
		        </li>
		        <li>
	            <a href="#">Portfolio</a>
		        </li>
		        <li>
		        	<a href="#">Contact</a>
				</li>
			</ul>
		</nav>
		<button type="button" id="sidebarCollapse" class="btn btn-info">
        	<i class="fas fa-align-left"></i>
            <span>Toggle Sidebar</span>
        </button>

		<script type="text/javascript">
			$(document).ready(function(){
				$("#sidebar").mCustomScrollbar({
					theme: "minimal"
				});

				$("#dismiss .overlay").click(function(){
					$("#sidebar").removeClass("active");
					$(".overlay").removeClass("active");
				});

				$("sidebarCollapse").click(function(){
           			$('#sidebar').addClass('active');
            			// fade in the overlay
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
				})
			
		</script>
		<div class="container-fluid">
			<div class="row" style="height: 100%;">
				<div class="col-md-6">
					<div class="row" style="height: 50%;">
						<div class="col-md-12">
							Timetable
						</div>
					</div>
					<div class="row" style="height: 50%;">
						<div class="col-md-12">
							<input class="daterangepicker-field" id="daterangepicker-field" />
							<script type="text/javascript">
							</script>
						</div>
					</div>
				</div>
				<div class="col-md-6" style="overflow-y: scroll">
					<div class="card bg-light" style="margin-top: 5px;">
						<div class="card-body">
							<h4 class="card-title">
								Your todo list 
								<span style="float: right;">
									<i id="icon_1_hamburger" class="fas fa-bars icon icon_hamburger rotate"></i>
									&nbsp;
									<i id="icon_1_list" class="fas fa-th-large icon icon_other rotate"></i>
								</span>
							</h4>
							<div class="form-group">
								<div class="input-group mb-3">
									<div style="width: 100%;" class="row">
										<div class="col-10">
											<button id="filterbutton" class="form-control btn btn-primary">Filter</button>
										</div>
										<div class="col-2">
											<button class="btn btn-primary form-control" style="width:100%;" id="advancedOptionsButton"><i class="fas fa-arrow-alt-circle-down rotate" id="adArrow"></i></button>
										</div>
									</div>
								</div>
							</div>
							<div id="advancedOptions" class="hidden">
								<div class="form-group">
									<div class="input-group mb-3">
										<input type="text" class="form-control" id="date" aria-describedby="dateHelp" placeholder="To" disabled required />
										<input type="text" class="form-control" id="date1" placeholder="From" disabled required />
										<input type="hidden" value="" id="hiddenDate" />
										<div class="input-group-append icon" id="dateTooltip">
											<span class="input-group-text icon" id="basic-addon2"><i id="calender_1" class="far fa-calendar-alt icon"></i></span>
										</div>
									</div>
									<div class="input-group mb-3">
										<div class="row">
											<div class="col-md-6">
												<div class="custom-control custom-checkbox mb-3">
 													<input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
													<label class="custom-control-label" for="customControlValidation1">Show Completed?</label>
  												</div>
											</div>
											<div class="col-md-6">
												<div clasS="custom-control custom-checkbox mb-3">
													<input type="checkbox" class="custom-control-input" id="customControlValidation2" required>
													<label class="custom-control-label" for="customControlValidation2">Show something else?</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">

								</div>
							</div>
						</div>
					</div>
					<script type="text/javascript">
						$("#advancedOptionsButton").click(function( ) {
							if ($("#advancedOptions").is(":animated")) return false; //if it is currently going up or down then don't do anything.
							let speed = "medium"; //speed of hiding/showing the advanced options
							switch ($("#advancedOptions").is(":visible")) {
								case true  : $("#advancedOptions").hide(speed); break;
								case false : $("#advancedOptions").show(speed); break;
							}

							$("#adArrow").toggleClass("down");
						});
						$("#advancedOptionsButton").tooltip({"trigger":"hover", "title":"Advanced Options"});
						$("#filterbutton").tooltip({"trigger":"hover", "title":"Filter"});
						$("#calender_1").tooltip({"trigger":"hover", "title": "Select Date", "placement":"bottom"});
						//now start the daterangepicker
						$(function( ) {
							$("#basic-addon2").daterangepicker({
								startDate: 1900,
								endDate: 2100
							}, function(start, end, label) {
								$("#date").val(start.format("YYYY-MM-DD"));
								$("#date1").val(end.format("YYYY-MM-DD"));
							});
						});
					</script>
					<div id="cardContainer" class="cardContainer animateDiv">
						<div class="card bg-light cardClass">
							<div class="card-body">
								<h4 class="card-title">
									Card Title Here
								</h4>
							</div>
						</div>
						<div class="card bg-light cardClass">
							<div class="card-body">
								<h4 class="card-title">
									Card Title Here
								</h4>
							</div>
						</div>
						<div class="card bg-light cardClass">
							<div class="card-body">
								<h4 class="card-title">
									Card Title Here
								</h4>
							</div>
						</div>
						<div class="card bg-light cardClass">
							<div class="card-body">
								<h4 class="card-title">
									Card Title Here
								</h4>
							</div>
						</div>
						
						<!--EXAMPLE_CARD
						<div class="card bg-light" style="margin-top: 5px; ">
							<div class="card-body">
								<h4 class="card-title">
									Card Title Here
									<span style="float: right;">
										<i id="icon_1_hamburger" class="fas fa-paperclip icon icon_paperclip"></i>
										<i id="icon_1_list" class="fas fa-pen icon icon_pen"></i>
									</span>
								</h4>
							</div>
						</div>-->
					</div>
					<div id="loader" class="hidden">
						<div class="spinner"></div>
						<p class="loading_line" id="loadingLine"></p>
					</div>
				</div>	
			</div>
		</div>
		<div class="overlay"></div>
		<script type="text/javascript" src="assets/js/loadingLines.js"></script>
		<script type="text/javascript">
			function getRandomLoadingLine( ) {
				loadingLines = getLoadingLines( );
				randint = Math.floor(Math.random( )*loadingLines.length);
				return loadingLines[randint];
			}
		</script>
		<script type="text/javascript">
			$("#icon_1_list").tooltip({"trigger":"hover", "title":"Grid layout"});
			$("#icon_1_list").click(function( ) {
				if (!document.getElementById("cardContainer").classList.contains("cardContainer")) {
					$(this).toggleClass("down");
				}
				$("#cardContainer").addClass("cardContainer");
			});
		</script>
		<script type="text/javascript">
			$("#icon_1_hamburger").tooltip({"trigger":"hover", "title":"List layout"});
			$("#icon_1_hamburger").click(function(){
				if (document.getElementById("cardContainer").classList.contains("cardContainer")) {
					$(this).toggleClass("down");
				}
				$("#cardContainer").removeClass("cardContainer");

			});
		</script>
		<script type="text/javascript">
			$(function( ) {
				$("advancedOptions").click(function( ) {

				});
			});
		</script>
		<script type="text/javascript">

		</script>
	</body>
</html>