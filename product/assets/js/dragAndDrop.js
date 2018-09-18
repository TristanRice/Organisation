class App{
	static init(){
		App.box=document.getElementsByClassName('boxy');
		for (let i=0;i<App.box.length;i++){
			App.box[i].addEventListener("dragstart",App.dragstart);
			App.box[i].addEventListener("dragend",App.dragend);
		}
		App.conatiner=document.getElementById("container");
		const containers=document.getElementsByClassName('boxbox');
		for(const container of containers){
			container.addEventListener("dragover",App.dragover);
			container.addEventListener("dragenter",App.dragenter);
			container.addEventListener("dragleave",App.dragleave);
			container.addEventListener("drop",App.drop);
		}
	}
	static componentToHex(c) {
	    var hex = c.toString(16);
   		return hex.length == 1 ? "0" + hex : hex;
	}	

	static rgbToHex(r, g, b) {
    	return "#" + App.componentToHex(r) + App.componentToHex(g) + App.componentToHex(b);
	}

	static dragstart(e){
		//e.dataTransfer.setData("text",JSON.stringify({"class":this.classList[2], "subjectName":this.innerHTML}));
		console.log(this.style.getPropertyValue("background"));
		e.dataTransfer.setData("text", JSON.stringify({"color":this.style.getPropertyValue("background"), "subjectName":this.innerHTML}));
	}
	static dragend(e){
		e.preventDefault( );
		this.className+=" "+e.target.classList[2];
	}
	static dragover(e){
		e.preventDefault();
	}	
	static dragenter(e){
		e.preventDefault();
		this.className+=" hoveredClass";
	}
	static dragleave(){
		this.classList.remove("hoveredClass");
	}
	static drop(e){
		e.preventDefault( );
		let the=JSON.parse(e.dataTransfer.getData("text"));
		console.log(the["color"]);
		let color = the["color"].substr(4, the["color"].length-5);
		let colors__ = color.split(",");
		let hex = App.rgbToHex(parseInt(colors__[0]), parseInt(colors__[1]), parseInt(colors__[2]));
		this.className = this.className.substr(0,30);
		this.style.background = hex;
		//this.className=this.className.substr(0,30)+" "+the["class"];
		if (this.innerHTML!=="") {
			sendAjaxRequest({
				"url":"ajax/timetable/deleteTimeTable.php",
				"data":{"timeID":this.id, "dayID":this.parentNode.id}
			});
		}
		this.innerHTML=the["subjectName"];
		sendAjaxRequest({
			"url":"ajax/timetable/submitTimeTable.php",
			"data":{ "timeID":this.id, "dayID":this.parentNode.id, "subject":the["subjectName"], "color":hex}
		});
	}
}
document.addEventListener("DOMContentLoaded",App.init);