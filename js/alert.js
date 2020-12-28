function show() {

		var alert = document.getElementById('alert');
		alert.style.display="none";
		window.open('index.php','_self');
}

function showinc() {

		var alert = document.getElementById('alert');
		alert.style.display="none";
		window.open('../cart.php','_self');
}

function cart() {

		var alert = document.getElementById('alert');
		alert.style.display="none";
		window.open('cart.php','_self');
}



 function load() { 
	var loader = document.getElementById('loader');
	if (loader.style.display="block") {	
		loader.style.display = 'none';
	} else {
		console.log('idh89');
	}
}

//document.addEventListener('DOMContentLoaded',load,false);