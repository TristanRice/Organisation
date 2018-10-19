$(function(){
	let all_items = document.querySelectorAll(".sidenav_list");
	let fade_speed = 500
	let all_colors = { 
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
		/*ToDo: make decision whether to keep this or not*/
		//if ($("#sidenav_item_1").is(":animated")) return false; //if its already being animated don't queue another animateion
		for (var i = 0; i<all_items.length; i++) {
			$("#"+all_items[i].id).animate({color:all_colors[all_items[i].id]}, fade_speed);
		}
		/*Now make the text fade in */
		$(".sidenav_text").animate({"opacity":1}, fade_speed);
	});
	$("#sidebar").mouseleave(function(){
		$(".sidenav_list").animate({color: "#FFFFFF"}, fade_speed);
		$(".sidenav_text").animate({"opacity":0}, fade_speed);
	});

	function leave_search( ) {
		$("#sidebar").removeClass("active");
		$("#showSearch").hide( );
		$("#showNormal").show("medium");
		$("#hideInSearch").animate({"opacity":"1"});
	}

	$("#sidenav_icon_5").click(function( ) {
		$("#sidebar").toggleClass("active", 1000, function( ) {
			$("#showSearch").show("fast");
		});
		$("#showNormal").hide( );
		$("#hideInSearch").animate({"opacity":"0"}, 50);
		$(document).keyup(function(e) {
			switch(e.key) {
				case "Escape":
					leave_search( );
					break;

				default:
					return;
			}
		});
		$("#restOfPage").click(function( ) {
			leave_search( );
		})
	});
});
$("#inlineFormInputGroup").tooltip({"trigger":"focus", "title":"Press enter to search"}); //there is no text on the search so this will be used 