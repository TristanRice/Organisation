<?php
include "config/config.php";
include "includes/site-include.inc.php";
Site::init( $connection );
?>
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
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap-confirmation2/dist/bootstrap-confirmation.min.js"></script>
		<link rel="stylesheet" href="assets/css/dashstyle.css" />
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
					<li id="sidenav_item_5_back" class="sidenav_list">
						<!--<div id="showNormal">
							<i id="sidenav_icon_5" class="fas fa-3x fa-search sidenav_item"></i>
							<p class="sidenav_text" id="sidenav_text_5" style="opacity: 0;">&nbsp;</p>
						</div>-->
						<div id="showSearch" class="hidden">
							<form class="form-inline" onsubmit="return false;">
								<div class="input-group mb-2 mr-sm-2 mb-sm-0">
									<div class="input-group-addon">
										<i class="fas fa-search"></i>
										<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search">
									</div>
								</div><!--.input-group mb-2 mr-sm-2 mb-sm-0-->
							</form>
							
						</div>
					</li>

					<div id="hideInSearch">
						<li id="sidenav_item_5" class="sidenav_list">
							<i id="sidenav_icon_5" class="fas fa-3x fa-search sidenav_item"></i>
							<p class="sidenav_text" id="sidenav_text_5" style="opacity: 0;">Search</p>
						</li>
						<li>&nbsp;</li>

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
					</div>
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
												<option value="5" selected disabled>How many items should we display per page?</option>
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
														<label class="custom-control-label" for="customControlValidation2">Show Delted?</label>
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
			function alert_user(alert_class, message) {
				function end_animation(user_alert) {
					$(user_alert).addClass("hidden");
					$(user_alert).html("");
					$(user_alert).css({"opacity":"1"});
				}
				let html = `<div class="alert alert-${alert_class} childUserAlert" id="theAlert">${message}
								<div class="cancelAlert" id="cancelAlertButton">
								<i class="fas fa-times icon" id="closeAlert"></i></div></div>`; //create the html for the alert
				$("#userAlert").html(html);
				$("#userAlert").removeClass("hidden");
				$("#userAlert").animate({"opacity":0}, 5000, function( ) {
					end_animation("#userAlert");
					return;
				});
				
				
				$("#theAlert").hover(function( ) {
					console.log("test");
					$("#userAlert").stop( ).css({"opacity":"1"});
					return alert_user(alert_class, message);
				});
				$("#closeAlert").click(function( ) {
					console.log("Here");
					end_animation("#userAlert");
					return;
				})
			}
		</script>
		<script type="text/javascript">
			function deal_with_json( output ) {
				cards = JSON.parse(output);
				if (cards.error) {
					alert_user(cards.error);
					return;
				} //show error here
				let html = "";
				let id_counter = 0;
				for (var card = 0; card<cards.length; card++){
					if (!cards.hasOwnProperty(card)) continue;
					if (cards[card].data==null) cards[card].data = "";
					if (cards[card].title==null) cards[card].title = ""; //make sure that it won't say null in the div lmao.
					html += `<div id="${id_counter}" class="card bg-light cardClass">
								<div class="card-body">
									<h4 class="card-title" id="card-title${id_counter}">
										${cards[card].title}
										&nbsp;
									</h4>
								</div><!--.card-body-->
								<p class="hidden" id="cardContent${id_counter}">${cards[card].data}</p>
								<p class="hidden" id="cardTitle${id_counter}">${cards[card].title}</p>
								<p id="card_id${id_counter}" class="hidden">${cards[card].id}</p>
							</div><!--.card bg-light cardClass-->`;

					++id_counter;
				}
				return html;
			}

			function add_tooltips( ) {
				$(".cardClass").tooltip({"trigger": "hover", "title": "Click Me!", "placement": "top"});
			}

			function make_skeleton_cards( amount ) {
				return "<div class=\"skeleton cardClass\"></div>".repeat(amount);
			}

			$(function( ) {
				$("#cardContainer").html(make_skeleton_cards(5)); //create SPOOKY SKELETON KEY AAAAAAAAAAAA
				$.ajax({
					url: "ajax/todolist/getSpecificTodoLists.php",
					type: "GET",
					data: {
						completed: "true"
					},
					success: function( html ) {
						$("#cardContainer").html(deal_with_json(html));
						add_tooltips( );
					},
					error: function( e ) {
						deal_with_json("{\"error\":\"Failed to get information, please try again later\"}"); //I'm SO fucking retarded
					}
				});
				
			});
		</script>
		<script type="text/javascript">
			//Todolist for4 19/10/2018
			/*
			* merge html functions (or find a better way to do it than what I'm doing rn)
			* 
			*/
			drag_options = {
				scroll: false, 
				cursor: "pointer",
				containment: "window"
			}

			function escapeHtml(text) {
				//for some reason its changing &quot back to " just for make_card_edit, so this is a temporary solution
				var map = {
					'"': '&quot;',
					"'": '&#039;'
				};

				return text.replace(/["']/g, function(m) { return map[m]; });
			}

			function focus_on_card( title, content ) {
				//make the html
				let html = "";

				html += "<div class=\"mainDiv card\" id=\"insideCard\">";
				html += "<div class=\"card-body\">";
				html += "<h4 class=\"card-title\">";
				html += title;
				html += "<span style=\"float: right;\">";
				html += "<i id=\"icon_1_attatch\" class=\"fas fa-paperclip icon icon_paperclip\" onclick=\"window.location.href='#image'\"></i>&nbsp;";
				html += "<i id=\"icon_1_edit\" class=\"fas fa-pen icon icon_pen\"></i>&nbsp;";
				html += "<i id=\"icon_1_trash\" class=\"fas fa-trash-alt icon icon_trash\"></i>&nbsp;";
				html += "<i id=\"icon_1_complete\" class=\"fas fa-check icon icon_complete\"></i>&nbsp;";
				html += "</span></h4>";
				html += content;
				html += "</div></div>";

		
				//ToDo: move this to another function
				$("#mainDivContainer").toggleClass("hidden");
				$("#mainDivContainer").html(html);
				$("#tintPage").toggleClass("tinted");
			} 

			function go_back_to_card( title, content ) {
				let html = "";

				html += "<div class=\"card-body\">";
				html += "<h4 class=\"card-title\">";
				html += title;
				html += "<span style=\"float: right;\">";
				html += "<i id=\"icon_1_attatch\" class=\"fas fa-paperclip icon icon_paperclip\" onclick=\"window.location.href='#image'\"></i>&nbsp;";
				html += "<i id=\"icon_1_edit\" class=\"fas fa-pen icon icon_pen\"></i>&nbsp;";
				html += "<i id=\"icon_1_trash\" class=\"fas fa-trash-alt icon icon_trash\"></i>&nbsp;";
				html += "<i id=\"icon_1_complete\" class=\"fas fa-check icon icon_complete\"></i>&nbsp;";
				html += "</span></h4>";
				html += content;
				html += "</div>";

				return html;
			}

			function make_input_html( ) {
				//this is pretty much completed, but is still missing color and image functionality, which I will add soon
				return `<div class="mainDiv card" id="insideCard">
						<div class=\"card-body\">
						<h4 class=\"card-title\">
						<div class="input-group mb-3">
							<input type="text" class="form-control" id="title" placeholder="Title">
							<input type="text" class="form-control" id="date50" aria-describedby="dateHelp" placeholder="Completed by" disabled required />
							<input type="hidden" value="" id="hiddenDate5" />
							<div class="input-group-append icon" id="dateTooltip5">
								<span class="input-group-text icon" id="basic-addon22"><i id="calender_1" class="far fa-calendar-alt icon"></i></span>
							</div><!--.input-group-append icon-->
						</div><!--.input-group mb-3-->
						</h4>
						<div class=\"form-group\">
						<textarea placeholder=\"content\" class=\"form-control\" id=\"textArea3\" rows=\"7\"></textarea></div>
						<br /><div style=\"margin-top: 5px;\">
						<button id=\"cancelButton\" class=\"btn btn-danger\" style=\"float: left;\"><i class=\"fas fa-times\"></i></button>
						<button id=\"submitTodoList\" class=\"btn btn-success\" style=\"float: right;\"><i class=\"fas fa-check\"></i></button>
						</div></div>`;
			}

			function make_edit_html( title, content ) {
				//ToDo: merge this and the above function
				return  `<div class="card-body">
						 	<h4 class="card-title">
							<div class="input-group mb-3" id="title_3">
								<input type="text" class="form-control" id="title" value="${title}">
							</div><!--.input-group mb-3-->
					     	</h4>
						 	<div class="form-group">
						 		<textarea class="form-control" id="textArea4" rows="7">${content}</textarea>
						 	</div>
						 	<br /><div style="margin-top: 5px;">
						 	<button id="cancelButton_edit" class="btn btn-danger" style="float: left;"><i class="fas fa-arrow-left"></i></button>
						 	<button id="submitTodoList_edit" class="btn btn-success" style="float: right;"><i class="fas fa-check"></i></button>
						 	</div>`;

			}

			function make_card_edit( title, content, id, maskCard ) {
				$("#insideCard").html("");
				$("#insideCard").html(make_edit_html(escapeHtml(title), escapeHtml(content)));
				$("#cancelButton_edit").click(function( ) {
					$("#insideCard").html(go_back_to_card(title, content));
					return add_event_listeners( title, content );
				});
				$(document).keyup(function( e ) {
					if (e.key=="Enter") {
						submit_edit(title, content, id, maskCard);
					}
				});
				$("#submitTodoList_edit").click(function( ) {
					submit_edit(title, content, id, maskCard);
				});
			}

			function submit_edit( content, title, id, maskCard ) { 
				if ($("#textArea4").val( ) === content || $("#title").val( ) === title ) return;
				make_api_call( "edit", data={
						title: $("#title").val( ), newData: $("#textArea4").val( ), id: id
					}, function( ) { //in the callback remember to change the html of the card. 
						$("#card-title"+maskCard).html("");
						$("#card-title"+maskCard).html(`${title} &nbsp;`);
					});
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

			function make_api_call( type, data={}, callback=function(){}, go_back_to_normal=true ) {
				let ajax_config = {
					url: "ajax/todolist/",
					data: data,
					method: "GET" //almost all API calls will be GET, so that'll be the default 
				};
				let data_config = {
					message_success: "",
					message_danger: ""
				};
				switch (type) {
					case "delete":
						ajax_config.url+="deleteTodoList.php";
						data_config.message_success+="Todolist deleted";
						data_config.message_danger+="Failed to delete todolist";
						ajax_config.method = "POST";
						break;
					case "complete":
						ajax_config.url+="completeTodolist.php";
						data_config.message_success+="Completed successfully";
						data_config.message_danger+="Failed to complete todolist";
						break;
					case "submit":
						ajax_config.url+="addTodoList.php";
						ajax_config.method = "POST";
						data_config.message_success+="Todolist has been added!";
						data_config.message_danger+="There was an error, please try again later";
						break;
					case "filter":
						ajax_config.url+="getSpecificTodoLists.php";
						go_back_to_normal = false;
						data_config.message_success+="Filtered successfully";
						data_config.message_danger+="Failed to filter, please try again later";
						break;
					case "edit":
						ajax_config.url+="editTodoList.php";
						data_config.message_success+="Edited successfully";
						data_config.message_danger+="Failed to edit, please try again later";
						break;
					default:
						return; //if there is a typo or something
				}
				$.ajax({
					url: ajax_config.url,
					type: ajax_config.method,
					data: ajax_config.data,
					success: function( html ) {
						console.log(html);
						switch (html) {
							case "":
								alert_user("success", data_config.message_success);
								if (go_back_to_normal) {
									back_to_normal( );
								}
								break
							default:
								console.log(html);
								alert_user("danger", data_config.message_danger);
								break;
						}
					},
					error: function( e ) {
						console.log(e);
						alert_user("danger", data_config.message_danger)
					}
				});
				callback( );
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
				make_api_call("submit", data={due_by: date, title: title, content: content}, function( ){
					$("#cardContainer").append(`
						<div class="card bg-light cardClass">
								<div class="card-body">
									<h4 class="card-title">
										${title}
									</h4>
								</div><!--.card-body-->
								<p class="hidden">${date}</p>
								<p class="hidden">${title}</p>
							</div><!--.card bg-light cardClass-->
					`);

				});
			}

			function deal_with_keypress( e, submit=false ) {
				switch(e.key) {
					case "Escape":
						back_to_normal( );
						break;

					case "Enter":
						if (submit && !$("#textArea3").is(":focus") /* make sure that the user isn't just making a newline */) {
							submit_todolist( );
						}
						break;

					default:
						return;			
				}
			}
			
			function dragAroundDiv( id, options_drag = {} ) {
				$("#"+id).draggable(options_drag)
			}

			function add_event_listeners( title, content, card_id, id ) {
				/*
				* this cannot be in the main event listener because I need to return to this
				* functionality after the user goes back from editing the card 
				*/
				$("#tintPage").click(function(){
					back_to_normal( );
				});
				$("#icon_1_edit").click(function( ) {
					make_card_edit( title, content, card_id, id );
				});
				$("#icon_1_trash").click(function( ) {
					make_api_call("delete", data={"id":card_id}, function(){
						$("#"+id).remove( );
					});
				});
				$("#icon_1_complete").click(function( ) {
					make_api_call("complete", data={id:card_id}, function(){} /*dynamically remove todolist item */);
				});
				$(document).keyup(function(e){
					deal_with_keypress( e, submit=false );
				})
				dragAroundDiv("insideCard", options_drag=drag_options);
			}

			$(function() {
				$("#cardContainer").click(function( e ) {
					if (e.target && e.target.nodeName=="DIV" || e.target.nodeName=="H4") {
						let target = e.target;
						if (target.classList.contains("cardContainer") || target.classList.contains("skeleton")) return;
						while ( !target.classList.contains("cardClass") ) target = target.parentNode;
						let childNodes = target.childNodes; //I don't really feel bad about this since because they're hidden divs they're unlikely to change position
						focus_on_card(childNodes[6].innerHTML, childNodes[4].innerHTML, childNodes[8].innerHTML);
						add_event_listeners( childNodes[6].innerHTML, childNodes[4].innerHTML, childNodes[8].innerHTML, target.id);
					}
				});
			});

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
				dragAroundDiv("insideCard", options_drag=drag_options);
				$("#tintPage").click(function(){
					back_to_normal( );
				});
				$(document).keyup(function(e) {
					deal_with_keypress(e, submit=true);
				});
				$("#cancelButton").click(function( ) {
					back_to_normal( ); //in case the user wants to be extra and actually click on the button
				});
				$("#submitTodoList").click(function( ) {
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
					html += "<h4 Class=\"card-title\">";
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
					$.ajax({
						url: "ajax/todolist/getSpecificTodoLists.php",
						type: "GET",
						data: {
							completed: "true"
						},
						success: function( html ) {
							$("#cardContainer").html(deal_with_json(html));
							add_tooltips( );
						},
						error: function( e ) {
							deal_with_json("{\"error\":\"Failed to get information, please try again later\"}"); //I'm SO fucking retarded
						}
					});
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
		<script type="text/javascript" src="assets/js/sidebar.js"></script>
		<script type="text/javascript">
			$("#icon_1_list").tooltip({"trigger":"hover", "title":"Grid layout"});
			$("#icon_1_hamburger").tooltip({"trigger":"hover", "title":"List layout"});
			$("#icon_1_list").click(function( ) {
				$(this).toggleClass("down");
				$("#cardContainer").addClass("cardContainer");
			});
			$("#icon_1_hamburger").click(function(){
				$(this).toggleClass("down");
				$("#cardContainer").removeClass("cardContainer");

			});
		</script>
	</body>
</html>