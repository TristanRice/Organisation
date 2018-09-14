function sendAjaxRequest( json ) {
	$.ajax({
		url   : json.url,
		cache : false,
		type  : "GET",
		data  : json.data,
		success: function(html){
			switch (html) {
				case "" : break;
				default : console.log(html); break;
			}
		},
		fail: function(html){
			//Todo: show an error message here
		}
	});
}