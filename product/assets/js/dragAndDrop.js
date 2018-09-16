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
	static dragstart(e){
		e.dataTransfer.setData("text",JSON.stringify({"class":this.classList[2], "subjectName":this.innerHTML}));
	}
	static dragend(e){
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
		let the=JSON.parse(e.dataTransfer.getData("text"));
		this.className=this.className.substr(0,30)+" "+the["class"];
		this.innerHTML=the["subjectName"];
		sendAjaxRequest({
			"url":"ajax/timetable/submitTimeTable.php",
			"data":{
				"timeID":this.id,
				"dayID":this.parentNode.id,
				"subject":the["subjectName"]
			}
		});
	}
}
document.addEventListener("DOMContentLoaded",App.init);