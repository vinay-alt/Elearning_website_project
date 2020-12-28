
function side() {
	var bar = document.getElementById('cat_bodyleft');

    if (bar.style.display = "block") {
    	bar.style.display = "none";
    } 	
}

function sideBar() {
    var bar = document.getElementById('cat_bodyleft');
    if (bar.style.display = "none") {
    	bar.style.display = "block";
    } 
}



 var block = function () {
 	//console.log(window.innerWidth);
 	var eventHandler = function () {
 		var bar = document.getElementById('cat_bodyleft');
 		if (window.innerWidth>679) {
 			bar.style.display = "block";
 		}
 	}
 	window.addEventListener('resize',eventHandler,false);
}


document.addEventListener('DOMContentLoaded',block,false);




//function side1() {
//	
//	var x =1;
 //   if (bar.style.display = "block") {
   // 	bar.style.display = "none";
    //} 	
//}