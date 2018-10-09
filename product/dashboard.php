<!DOCTYPE html>
<html lang="en">
	<head>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<!--<link rel="stylesheet" href="assets/css/style.css" />-->
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
			}

			.cardClass {
				margin-top: 5px;
				width: 50%;
				height: 15%;
			}

			.cardClass:hover {
				cursor: pointer;
			}
		</style>
		<title>Dashboard</title>
	</head>
	<body>
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
								$("#daterangepicker-field").datepicker({
								    format: 'mm/dd/yyyy',
    								startDate: '-3d'
    								//ToDo: decide how to lay this out.								})
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
									<i id="icon_1_hamburger" class="fas fa-bars icon icon_hamburger"></i>
									&nbsp;
									<i id="icon_1_list" class="fas fa-grip-vertical icon icon_other"></i>
								</span>
							</h4>

							<p class="card-text">Showing results for: </p>
							<a href="#" class="card-link">testerino</a>
						</div>
					</div>
					<div id="cardContainer" class="cardContainer">
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
			$("#icon_1_list").click(function(){
			});
		</script>
		<script type="text/javascript">
			$("#icon_1_hamburger").tooltip({"trigger":"hover", "title":"List layout"});
			$("#icon_1_hamburger").click(function(){
				document.getElementById("loader").classList.remove("hidden");
				document.getElementById("cardContainer").classList.add("hidden");
				document.getElementById("loadingLine").innerHTML = getRandomLoadingLine( );
			});
		</script>
	</body>
</html>