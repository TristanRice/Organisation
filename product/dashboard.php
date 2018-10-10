<!DOCTYPE html>
<html lang="en">
	<head>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<!--<link rel="stylesheet" href="assets/css/style.css" />-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<link rel="stylesheet" href="test.css">
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
		</style>
		<title>Dashboard</title>
	</head>
	<body>
		
<div class="cover" onclick="toggleSidenav();"></div>
<div class="hamburger" id="hamburger" onclick="toggleSidenav();">
  <div></div>
  <div></div>
  <div></div>
</div>
<nav class="sidenav">
  <div class="logo">
    <img src="http://lorempixel.com/128/128/animals/"/>
  </div>
  <div class="links">
    <a class="active" href="">Home</a>
    <a href="#">Portfolio</a>
    <a href="#">Blog</a>
    <a href="#">Contact</a>
  </div>
  <footer>
    <p>the nudging sidenav</p>
  </footer>
</nav>

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

							<p class="card-text">Showing results for: </p>
							<a id="moreOptions" href="#" class="card-link">Advanced options</a>
							<div id="advancedOptions" class="hidden">
								<div class="row">
									Filter by
									<div class="col-md-3">
										<div class="form-group">
											<label for="">date</label>
											<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
											<small id="emailHelp" class="form-text text-muted">wE'lL nEvEr ShArE yOuR dAtE wItH aNyOnE eLsE
										</div>
									</div>
									<div class="col-md-3">

									</div>
									<div class="col-md-3">

									</div>
								</div>
							</div>
						</div>
					</div>
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
					console.log("here");
				}
				$("#cardContainer").removeClass("cardContainer");

			});
		</script>
		<script type="text/javascript">
			$(function(){
				$("advancedOptions").click(function(){

				})
			})
		</script>
		<script type="text/javascript">

		</script>
	</body>
</html>