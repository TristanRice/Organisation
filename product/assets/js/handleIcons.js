document.addEventListener('DOMContentLoaded', function(){
	//add an event listener to the containing div
	showing = false;
	let app = document.getElementById("app");
	//attaches an event listener to the whole div
	allFiles = {};
	function writeToArray( url, data )
	{   allFiles["url"]  = url;
		allFiles["data"] = data;
	}
	app.addEventListener("click", function(e){
		parentNode = e.target.parentNode; //the element that the user clicks
		if (e.target && parentNode.nodeName === "P") {
			switch (e.target.getAttribute("name")) 
			{	case "edit":
					prevHTML	  = parentNode.parentNode.innerHTML;
					let pIndex	  = prevHTML.indexOf('<p class="makePointer"');
					let dIndex	  = prevHTML.indexOf('<p id="thejob">')+15;
					let dataVal   = prevHTML.substring(0, pIndex);
					let dateVal   = prevHTML.substring(dIndex, prevHTML.length-6)
					let newString = "<input id=\"newjob\" value=\""+dataVal+"\" type=\"text\">" + 
									prevHTML.substring(pIndex, dIndex) + 
									"<input id=\"newDate\" value=\""+dateVal+"\" type=\"text\"></p></div>";
					if (!showing)
					{	parentNode.parentNode.innerHTML = newString; }
					showing = true;
					app.addEventListener("keypress", function(y){
						switch (y.keyCode)
						{   case 13:
								//enter key
								try {
									newData = document.getElementById("newjob").value;
									newDate = document.getElementById("newDate").value;
								} catch (TypeError){
									//the user should not be able to change nothing
									break;
								}
								/*
								writeToArray("ajax/todolist/editTodoList.php", {
									"newData" : newData,
									"newDate" : newDate,
									"id"	  : e.target.parentNode.id
								});
								*/
								var theString = "<span class=\"title\">"+newData +
											prevHTML.substring(
											prevHTML.indexOf('<p class="makePointer"'), 
											prevHTML.indexOf('<p id="thejob">')+15) + "</span>" + 
											newDate + "</p></div>";
								parentNode.parentNode.innerHTML = theString;
								sendAjaxRequest({
											"url"  : "ajax/todolist/editTodoList.php", 
											"data" : {
												"newData":newData, 
												"newDate":newDate,
												"id"     :e.target.parentNode.id
											}
										}
									);
								showing = false;
								break;
							case 27:
								//escape key
								parentNode.parentNode.innerHTML = "<span class=\"title\">"+prevHTML+"</span>";
								showing = false;
								break;
							default:
								//any other key
								break;
						}
				});
				break; //
				case "delete": 
					//go up a ton of elements to get to the card div and then give it the hidden class.
					e.target.parentNode.parentNode.parentNode.parentNode.classList.add("hidden"); 
					sendAjaxRequest({"url":"ajax/todolist/deleteTodoList.php", "data":{"id":parentNode.id}});
					break;
				case "complete":
					e.target.parentNode.parentNode.parentNode.parentNode.classList.add("hidden");
					sendAjaxRequest({"url":"ajax/todolist/completeTodoList.php", "data":{"id":parentNode.id}});
					break;
			}
		}
	});
});