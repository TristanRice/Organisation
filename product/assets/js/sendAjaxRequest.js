function sendAjaxRequest( json ) {
	$.ajax({
		url   : allFiles.url, //
		cache : false,
		type  : "GET",
		data  : allFiles.data,
		success: function(html){
			console.log(html);
		},
		fail: function(html){
						//Todo: show an error message here
		}
	});
}