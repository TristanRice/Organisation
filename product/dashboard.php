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
		<script src="//cdn.jsdelivr.net/jquery.color-animation/1/mainfile"></script>
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

			.icon:hover { cursor: pointer; }

			.icon_other:hover { color: blue; }

			.icon_hamburger:hover { color: red; }

			.icon_paperclip:hover { color: purple; }

			.icon_pen:hover { color: lightblue; }

			.icon_trash:hover { color: red; }

			.icon_complete:hover { color: green; }

			.spinner {
				width: 40px;
				height: 40px;
				background-color: #333;

				margin: 10px auto;
				-webkit-animation: sk-rotateplane 1.2s infinite ease-in-out;
				animation: sk-rotateplane 1.2s infinite ease-in-out;
			}

			@-webkit-keyframes sk-rotateplane {

				0% { -webkit-transform: perspective(120px) }
				
				50% { -webkit-transform: perspective(120px) rotateY(180deg) }
				
				100% { -webkit-transform: perspective(120px) rotateY(180deg)  rotateX(180deg) }
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

			.cardClass:hover { cursor: pointer; }

			.carClass:nth-child(odd) { margin-left: 5px; }

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

			.wrapper {
				display: flex;
				width: 100%;
				align-items: stretch;
			}

			.wrapper {
			    display: flex;
			    align-items: stretch;
			}

			#sidebar {
			    min-width: 80px;
			    max-width: 80px;
			    background: #343a40;
			    height: 100vh;
			    color: #FFF;
			    transition: all 0.3s;
			}

			#sidebar.active {
			    min-width: 300px;
			    max-width: 300px;
			}

			#sidebar.active .sidebar-header h3,
			#sidebar.active .CTAs { display: none; }

			#sidebar.active .sidebar-header strong { display: block; }

			#sidebar ul li a { text-align: left; }

			#sidebar.active ul li a {
			    padding: 20px 10px;
			    font-size: 0.85em;
			}

			#sidebar.active ul li a i {
			    margin-right: 0;
			    display: block;
			    font-size: 1.8em;
			    margin-bottom: 5px;
			}

			#sidebar.active ul ul a { padding: 10px !important; }

			#sidebar.active .dropdown-toggle::after {
			    top: auto;
			    bottom: 10px;
			    right: 50%;
			    -webkit-transform: translateX(50%);
			    -ms-transform: translateX(50%);
			    transform: translateX(50%);
			}

			#sidebar .sidebar-header { padding: 20px; }

			#sidebar .sidebar-header strong {
			    display: none;
			    font-size: 1.8em;
			}

			#sidebar ul.components {
			    padding: 20px 0;
			}

			#sidebar ul li a {
			    padding: 10px;
			    font-size: 1.1em;
			    display: block;
			}

			#sidebar ul li a:hover {
			    color: #7386D5;
			    background: #fff;
			}

			#sidebar ul li a i {
			    margin-right: 10px;
			}

			#sidebar ul li.active>a,
			a[aria-expanded="true"] { color: #fff; }

			a[data-toggle="collapse"] { position: relative; }

			.dropdown-toggle::after {
			    display: block;
			    position: absolute;
			    top: 50%;
			    right: 20px;
			    transform: translateY(-50%);
			}

			ul ul a {
			    font-size: 0.9em !important;
			    padding-left: 30px !important;
			}

			ul.CTAs { padding: 20px; }

			ul.CTAs a {
			    text-align: center;
			    font-size: 0.9em !important;
			    display: block;
			    border-radius: 5px;
			    margin-bottom: 5px;
			}

			a.download {
			    background: #fff;
			    color: #7386D5;
			}

			a.article,
			a.article:hover {
			    background: #6d7fcc !important;
			    color: #fff !important;
			}

			.sidenav_hover_class:hover { cursor: pointer; }

			.sidenav_item:hover {
				font-size: 3.1em;
				transition: 0.1 ease-out;
			}
			
			.sidenav_list {}

			.align_icon_bottom {
				bottom: 10px;
				left: 10px;
				text-align: center;
				position: absolute;
			}

			.sidenav_text {}

			.tinted {
			    position: fixed;
			    top: 0;
			    left: 0;
			    width: 100vw;
			    height: 100vh;
			    background-color: black;
			    opacity: 0.7;
			    z-index: 1000;
			    display: inline-block;
			}

			.mainDiv {
				width: 40%;
				top: 20%;
				left: 30%;
				z-index: 20000; /*aLl ThE wAy To AbSuRdItY*/
				position: absolute;
			}

			.userAlert {
				z-index: 10000;
				top: 90%;
				width: 100%;
				position: absolute;
			}

			.childUserAlert {
				margin: 0 auto;
				width: 50%;
				text-align: center;
			}

			#insideCard:hover { cursor: pointer; }
		</style>
		<title>Dashboard</title>
	</head>
	<body>
		<div class="hidden" id="mainDivContainer"><!--.hidden-->
		</div><!--used to focus in on the card-->
		<div class="hidden userAlert" style="opacity: 1;" id="userAlert">
		</div><!--.userAlter-->
		<div class="wrapper">
			<noscript>
				<h1 style="color: red;">
					his page isn't ready to be used without javascript yet, if you look through what we have now you'll see that there's nothing malicious
					there. If you would kindly turn off your noscript, then you can view the full extent of this page's beauty. However, if you want to be 
					a sTiNgY person, then leave it on and you won't be able to experience the full beauty of what this webpage has to offer. If you have any
					concenrs, then feel free to email us at ashraf@live.com, where we will try to deal with your complaint as best we can.
				</h1>
			</noscript>
			<nav id="sidebar" class="sidenav_hover_class">
				<div class="sidebar-header">
					<strong>Search</strong>
				</div><!--.sidebar-header-->
				<ul class="list-unstyled components" style="text-align: center; vertical-align: middle">
					<li id="sidenav_item_5" class="sidenav_list">
						<div id="showNormal">
							<i id="sidenav_icon_5" class="fas fa-3x fa-search sidenav_item"></i>
							<p class="sidenav_text" id="sidenav_text_5" style="opacity: 0;">&nbsp;</p>
						</div>
						<div id="showSearch" class="hidden">
							<form class="form-inline">
								<div class="input-group mb-2 mr-sm-2 mb-sm-0">
									<div class="input-group-addon">
										<i class="fas fa-search"></i>
									<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search">
								</div><!--.input-group mb-2 mr-sm-2 mb-sm-0-->
							</form>
							<p class="sidenav_text" id="sidenav_text_5" style="opacity: 0;">Search</p>
						</div>
					</li>
					<li>&nbsp;</li><li>&nbsp;</li>
					<li id="sidenav_item_1" class="sidenav_list" style="vertical-align: middle;">
						<i id="sidenav_icon_1" class="fas fa-3x fa-home sidenav_item" onclick="window.location.href='#dashboard'"></i>
						<p class="sidenav_text" id="sidenav_text_1" style="opacity: 0;">Home</p>
					</li><!--.sidenav_item_1-->
					<li id="sidenav_item_2" class="sidenav_list">
						<i id="sidenav_icon_2" class="fas fa-3x fa-dollar-sign sidenav_item" onclick="window.location.href='#score'"></i>
						<p class="sidenav_text" id="sidenav_text_2" style="opacity: 0;">Score</p>
					</li><!--.sidenav_item_2-->
					<li id="sidenav_item_3" class="sidenav_list">
						<i id="sidenav_icon_3" class="fas fa-3x fa-user-alt sidenav_item" onclick="window.location.href='#profile'"></i>
						<p class="sidenav_text" id="sidenav_text_3" style="opacity: 0;">Profile</p>
					</li><!--.sidenav_item_3-->
					<li id="sidenav_item_4" class="sidenav_list">
						<i id="sidenav_icon_4" class="fas fa-3x fa-cogs sidenav_item" onclick="window.location.href='#settings'"></i>
						<p class="sidenav_text" id="sidenav_text_4" style="opacity: 0;">Settings</p>
					</li><!--.sidenav_item_4-->
				</ul><!--.list-unstyled components-->
			</nav><!--.sidenav_hover_class-->
			<div id="">
			</div><!--.overlay-->

			<div id="restOfPage" class="container-fluid">

				<div class="row" style="height: 100%;">
					<div class="col-md-6">
						<div class="row" style="height: 50%;">
							<div class="col-md-12">
								Timetable
							</div><!--.col-md-12-->
						</div><!--.row-->
						<div class="row" style="height: 50%;">
							<div class="col-md-12">
								<input class="daterangepicker-field" id="daterangepicker-field" />
								<script type="text/javascript">
								</script>
							</div><!--.col-md-12-->
						</div><!--.row-->
					</div><!--.col-md-6-->
					<div class="col-md-6" style="height: 100vh; overflow-y: auto;">
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
											<div class="col-8">
												<button id="filterbutton" class="form-control btn btn-primary">Filter</button>
											</div><!--.col-10-->
											<div class="col-2">
												<button class="btn btn-primary form-control" style="width:100%;" id="advancedOptionsButton"><i class="fas fa-arrow-alt-circle-down rotate" id="adArrow"></i></button>
											</div><!--.col-2-->
											<div class="col-2">
												<button class="btn btn-primary form-control" style="width:100%;" id="addNewTodoList"><i class="fas fa-plus"></i></button> 
											</div>
										</div><!--.row-->
									</div><!--.input-group mb-3-->
								</div><!--.form-group-->
								<div id="advancedOptions" class="hidden">
									<div class="form-group">
										<div class="input-group mb-3">
											<select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
												<option value="5" selected disabled>How many items should we display?</option>
												<option value="5">5</option>
												<option value="10">10</option>
												<option value="20">20</option>
											</select>
										</div><!--.input-group- mb-3-->
										<div class="input-group mb-3">
											<input type="text" class="form-control" id="date" aria-describedby="dateHelp" placeholder="To" disabled required />
											<input type="text" class="form-control" id="date1" placeholder="From" disabled required />
											<input type="hidden" value="" id="hiddenDate" />
											<div class="input-group-append icon" id="dateTooltip">
												<span class="input-group-text icon" id="basic-addon2"><i id="calender_1" class="far fa-calendar-alt icon"></i></span>
											</div><!--.input-group-append icon-->
										</div><!--.input-group mb-3-->
										<div class="input-group mb-3">
											<div class="row">
												<div class="col-md-6">
													<div class="custom-control custom-checkbox mb-3">
	 													<input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
														<label class="custom-control-label" for="customControlValidation1">Show Completed?</label>
	  												</div><!--.custom-control custom-checkbox mb-3-->
												</div><!--.row-->
												<div class="col-md-6">
													<div clasS="custom-control custom-checkbox mb-3">
														<input type="checkbox" class="custom-control-input" id="customControlValidation2" required>
														<label class="custom-control-label" for="customControlValidation2">Show something else?</label>
													</div><!--.custom-control custom-checkbox mb-3-->
												</div><!--.col-md-6-->
											</div><!--.row-->
										</div><!--.input-group mb-3-->
									</div><!--.form-group-->
									<div class="form-group">
									</div><!--.form-group-->
								</div><!--.hidden-->
							</div><!--.card-body-->
						</div><!--.card bg-light-->
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
							<div id="0" class="card bg-light cardClass">
								<div class="card-body">
									<h4 class="card-title">
										Card Title Here
									</h4>
								</div><!--.card-body-->
							</div><!--.card bg-light cardClass-->
							<div id="1" class="card bg-light cardClass">
								<div class="card-body">
									<h4 class="card-title">
										Card Title Here
									</h4>
								</div><!--.card-body-->
							</div><!--.card bg-light cardClass-->
							<div id="2" class="card bg-light cardClass">
								<div class="card-body">
									<h4 class="card-title">
										Card Title Here
									</h4>
								</div><!--.card-body-->
							</div><!--.card bg-light cardClass-->
							<div id="3" class="card bg-light cardClass">
								<div class="card-body">
									<h4 class="card-title">
										Card Title Here
									</h4>
								</div><!--.card-body-->
							</div><!--.card bg-light cardClass-->
							<div id="4" class="card bg-light cardClass">
								<div class="card-body">
									<h4 class="card-title">
										Card Title Here
									</h4>
								</div><!--.card-body-->
							</div><!--.card bg-light cardClass-->
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
						</div><!--.cardContainer animateDiv-->
						<button id="showBackCardsButton" class="hidden btn btn-primary" style="float: left ;">Back</button>
						<button id="showNextCardsButton" class="hidden btn btn-primary" style="float: right;">Next</button>
						<div id="loader" class="hidden">
							<div class="spinner"></div><!--.spinner-->
							<p class="loading_line" id="loadingLine"></p>
						</div><!--.hidden-->
					</div><!--.col-md-6-->	
				</div><!--.row-->
			</div><!--.container-fluid-->
		</div><!--.wrapper-->
		<div id="tintPage"></div><!--.tInTpAgE-->
		<script type="text/javascript">
			drag_options = {
				scroll: false,
				cursor: "pointer"
			}
			function focus_on_card( title, content ) {
				//make the html
				let html = "";

				html += "<div class=\"mainDiv card\" id=\"insideCard\">";
				html += "<div class=\"card-body\">";
				html += "<h4 class=\"card-title\">";
				html += title;
				html += "<span style=\"float: right;\">";
				html += "<i id=\"icon_1_attatch\" class=\"fas fa-paperclip icon icon_paperclip\"></i>&nbsp;";
				html += "<i id=\"icon_1_edit\" class=\"fas fa-pen icon icon_pen\"></i>&nbsp;";
				html += "<i id=\"icon_1_trash\" class=\"fas fa-trash-alt icon icon_trash\"></i>&nbsp;";
				html += "<i id=\"icon_1_complete\" class=\"fas fa-check icon icon_complete\"></i>&nbsp;";
				html += "</span></h4>";
				html += content;
				html += "</div></div>";

				$("#mainDivContainer").toggleClass("hidden");
				$("#mainDivContainer").html(html);
				$("#tintPage").toggleClass("tinted");
			}

			function make_input_html( ) {
				//this is pretty much completed, but is still missing color and image functionality, which I will add soon
				let html = "";
				html += "<div class=\"mainDiv card\" id=\"insideCard\">";
				html += "<div class=\"card-body\">";
				html += "<h4 class=\"card-title\">";
				html += `<div class="input-group mb-3">
							<input type="text" class="form-control" id="title" placeholder="Title">
							<input type="text" class="form-control" id="date50" aria-describedby="dateHelp" placeholder="Completed by" disabled required />
							<input type="hidden" value="" id="hiddenDate5" />
							<div class="input-group-append icon" id="dateTooltip5">
								<span class="input-group-text icon" id="basic-addon22"><i id="calender_1" class="far fa-calendar-alt icon"></i></span>
							</div><!--.input-group-append icon-->
						</div><!--.input-group mb-3-->`;
				html += "</h4>";
				html += "<div class=\"form-group\">";
    			html += "<textarea placeholder=\"content\" class=\"form-control\" id=\"textArea3\" rows=\"7\"></textarea></div>";
				html += "<br /><div style=\"margin-top: 5px;\">";
				html += "<button id=\"cancelButton\" class=\"btn btn-danger\" style=\"float: left;\"><i class=\"fas fa-times\"></i></button>";
				html += "<button id=\"submitTodoList\" class=\"btn btn-success\" style=\"float: right;\"><i class=\"fas fa-check\"></i></button>";
				html += "</div></div>";

				return html;
			}

			function make_edit_html( title, content ) {
				//ToDo: merge this and the above function
				let html = "";

				html += "<div class=\"card-body\">";
				html += "<h4 class=\"card-title\">";
				html += `<div class="input-group mb-3">
							<input type="text" class="form-control" id="title" placeholder="${title}">
						</div><!--.input-group mb-3-->`;
				html += "</h4>";
				html += "<div class=\"form-group\">";
    			html += `<textarea placeholder=\"${content}\" class=\"form-control\" id=\"textArea3\" rows=\"7\"></textarea></div>`;
				html += "<br /><div style=\"margin-top: 5px;\">";
				html += "<button id=\"cancelButton_edit\" class=\"btn btn-danger\" style=\"float: left;\"><i class=\"fas fa-times\"></i></button>";
				html += "<button id=\"submitTodoList_edit\" class=\"btn btn-success\" style=\"float: right;\"><i class=\"fas fa-check\"></i></button>";
				html += "</div>";

				return html;
			}

			function make_card_edit(title, content ) {
				$("#insideCard").html("");

				return;
			}

			function tint_page( html ) {
				$("#mainDivContainer").toggleClass("hidden");
				$("#mainDivContainer").html(html);
				$("#tintPage").toggleClass("tinted");
			}

			function back_to_normal( ) {
				$("#tintPage").removeClass("tinted");
				$("#mainDivContainer").addClass("hidden");
			}

			function alert_user(alert_class, message) {
				let html = "<div class=\"alert alert-"+alert_class+" childUserAlert\">"+message+"</div>";
				$("#userAlert").html(html);
				$("#userAlert").removeClass("hidden");
				$("#userAlert").animate({"opacity":0}, 5000, function( ) {
					//make sure that in the callback function everything is returned to how it was before 
					$("#userAlert").addClass("hidden");
					$("#userAlert").html("");
					$("#userAlert").css({"opacity":"1"}); //finally, remove the animation that we previously gave
				});
			}

			function submit_todolist( ) {
				let title = $("#title").val( );
				let date  = $("#date50").val( );
				let content = $("#textArea3").val( );
				if (title === "" || date === "" || content === "") {
					alert_user("danger", "Beep Boop evertyhing must be filled in, try again!");
					if (title==="") { $("#title").addClass("is-invalid"); } else { $("#title").addClass("is-valid"); }
					if (date==="") { $("#date50").addClass("is-invalid"); } else { $("#date50").addClass("is-valid"); }
					if (content==="") { $("#textArea3").addClass("is-invalid"); } else { $("#textArea3").addClass("is-valid"); }
					return;
				} 
				back_to_normal( );
				$.ajax({
					url: "ajax/todolist/addTodoList.php",
					type: "POST",
					data: {
						due_by: date,
						title:  title,
						content: content
					},
					success: function( html ) {
						alert_user("success", "Todolist has been added");						
					}, 
					error: function( html ) {
						alert_user("danger", "There was an error, please try again later");
					}
				});
			}

			function deal_with_keypress( e, submit=false ) {
				switch(e.keyCode) {
					case 27: //esc
						back_to_normal( );
						break;

					case 13: //enter
						if (submit && !$("#textArea3").is(":focus") /* make sure that the user isn't just making a newline */) {
							submit_todolist( );
						}
						break;

					default:
						return;			
				}
			}
			
			function dragAroundDiv( id, options = {} ) {
				$("#"+id).draggable(options)
			}

			$(function( ) {
				let cardContainer = document.getElementById("cardContainer"); 
				cardContainer.addEventListener("click", function( e ) {
					if (e.target && e.target.nodeName=="DIV" || e.target.nodeName=="H4") { 
						focus_on_card("title","content");
						$("#tintPage").click(function(){
							back_to_normal( );
						});
						$("#icon_1_edit").click(function( ) {
							make_card_edit( );
						});
						$(document).bind("keypress", function( e ) {
							deal_with_keypress( e );
						});
						dragAroundDiv("insideCard", options=drag_options);
					}
				});
			});
			let all_cards = document.querySelectorAll(".cardClass");
			for (var i =0; i < all_cards.length; i++) {
				$("#"+all_cards[i].id).tooltip({"trigger":"hover", "title":"Click Me!"})
			}
			$("#addNewTodoList").click(function( ) {
				tint_page(make_input_html( ));
				$("#basic-addon22").daterangepicker({
					singleDatePicker: true,
					showDropdowns: true,
					minYear: 2017,
					maxYear: 2100,	//this should  be changed in 2099 to avoid confusing xD
					drops: "up"
				}, function(start, end, label) {
					$("#hiddenDate5").val(start.format("YYYY-MM-DD"))
					$("#date50").val(start.format("YYYY-MM-DD"));
				});
				dragAroundDiv("insideCard", options=drag_options);
				$("#tintPage").click(function(){
					back_to_normal( );
				});
				$(document).bind("keypress", function( e ) {
					deal_with_keypress( e, submit=true );
				})
				$("#cancelButton").click(function( ) {
					back_to_normal( ); //in case the user wants to be extra and actually click on the button
				});
				$("#submitTodoList").click(function( ) {
					console.log("clicked");
					submit_todolist( );
				});
			});
		</script>
		<script type="text/javascript" src="assets/js/loadingLines.js"></script>
		<script type="text/javascript">
			function getRandomLoadingLine( ) {
				loadingLines = getLoadingLines( );
				randint = Math.floor(Math.random( )*loadingLines.length);
				return loadingLines[randint];
			}
		</script>
		<script type="text/javascript">
			function make_html(start_id, number_of_items ) {
				let html = "";					
				for (var i = start_id; i<number_of_items ; i++) {
					html += "<div id=\""+i+"\" class=\"card bg-light cardClass\">";
					html += "<div class=\"card-body\">";
					html += "<h4 Class=\"card-title\">"
					html += "Card title Here";
					html += "</h4>";
					html += "</div>";
					html += "</div>";
				}
				return html;
			}

			$(function() {
				$("#filterbutton").click(function( ) {
					let default_item_number = 5; //the default number of items to show
					let number_of_items = $("#inlineFormCustomSelect").val( ); //get the number of items that the user wants to show
					let final_id = $("#cardContainer").last( ).children( ).last( ).attr("id");
					if (!number_of_items) number_of_items = default_item_number; //if the user hasen't chosen anything, then make the number the default
					$("#cardContainer").html(""); //make sure we're working with a blank canvas
					$("#loader").show( ); //show the loading animation
					document.getElementById("loadingLine").innerHTML = getRandomLoadingLine( ); //this doesn't work with jquery for some reason?
					//now make the new HTML
					//ToDo: replace this with аджакс
					/*
					This works by getting the id of the final div in the caardContainer div, starting the loop on that number, and then going by that.
					Thgis means that I will always know what number to go by
					*/
					$.get({
						url: "ajax/todolist/getSpecificTodolists.php",

					})
					let length_of_json = 4;
					let html = 	make_html(0, number_of_items);
					if (length_of_json>number_of_items) $("#showNextCardsButton").show( );
					//now send that shit
					$("#cardContainer").html(html);
					$("loadingLine").html(""); //estar seguro que 2 lineas de cargando no aperecen
					$("#loader").hide( ); //finalmente, escondo la cosa de cargar
				});

				$("#showNextCardsButton").click(function( ) {

				});

				$("#showBackCardsButton").click(function( ) {
				});
			});
		</script>
		<div class="overlay"></div>
		<script type="text/javascript">
				$(function(){
					all_items = document.querySelectorAll(".sidenav_list");
					all_text_items = document.querySelectorAll(".sidenav_text");
					fade_speed = 500
					all_colors = { 
							sidenav_item_1: "#dbdb64", sidenav_item_2: "#2ab7ca", 
							sidenav_item_3: "#73f26f", sidenav_item_4: "#ff6347",
							sidenav_item_5: "#f27b7b"
					};
					/*
					This adds the colored classes to each icon to make it look nice when
					The user hovers over the sidebar. It also fades the text in cus idk 
					that is nice to do as well lmao
					*/
					$("#sidebar").hover(function(){
						/*First add the colors*/
						//if ($("#sidenav_item_1").is(":animated")) return false; //if its already being animated don't queue another animateion
						for (var i = 0; i<all_items.length; i++) {
							$("#"+all_items[i].id).animate({color:all_colors[all_items[i].id]}, fade_speed);
						}
						/*Now make the text fade in */
						for (var i = 0; i<all_text_items.length; i++) {
							$("#"+all_text_items[i].id).animate({"opacity":1}, fade_speed);
						}
					});
					$("#sidebar").mouseleave(function(){
						for (var i = 0; i<all_items.length; i++) {
							$("#"+all_items[i].id).animate({color:"#FFFFFF"}, fade_speed);
						}
						for (var i = 0; i<all_text_items.length; i++) {
							$("#"+all_text_items[i].id).animate({"opacity":0}, fade_speed);
						}
					});
					$("#sidenav_icon_5").click(function( ) {
						$("#sidebar").toggleClass("active", 1000);
						$("#showNormal").hide( );
						$("#showSearch").show("medium");
						document.getElementById("restOfPage").addEventListener("click", function(){
							//add an event listener so even if it goes out of this loop then it will still register if the page is clicked
							$("sidebar").toggleClass("active");
							document.getElementById("sidebar").classList.remove("active"); //$().removeClass didn't work for this? 
							$("#showSearch").hide( );
							$("#showNormal").show("medium");
						})
					});
				});
				//add toolips
				$("#inlineFormInputGroup").tooltip({"trigger":"focus", "title":"Press enter to search"}); //there is no text on the search so this will be used 
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