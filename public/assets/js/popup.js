// JavaScript Document
window.addEventListener("load",function(){
	setTimeout(
	function open(event){
		document.querySelector(".popup").style.display="block";
	},
		20000
	)
});
document.querySelector("#close").addEventListener("click", function(){
	document.querySelector(".popup").style.display = "none";
});
document.querySelector("#exit").addEventListener("click", function(){
	document.querySelector(".popup").style.display = "none";
});
let popups = document.getElementById("popup");
function closePopup(){
	popups.style.display = "none";
}

/*
function Popup(hideOrshow){
	if(hideOrshow == 'hide') document.getElementById('popup').style.display="none";
	else document.getElementById('popup').removeAttribute('style');
}
window.onload = function(){
	setTimeout(function(){
		Popup('show');
	},5000)
}
$(document).ready(function(){
	setTimeout(function(){
		Popup();
	},5000);
}




let popup = document.getElementById("popup");
function openPopup(){
	popup.classList.add("open-popup");
}
function closePopup(){
	popup.classList.remove("open-popup");
}

window.onload = function(){
	//var = document.getElementById("popup");
	var popup = document.getElementById("popup");
	popup.style.display = "block";
	
	document.getElementById("closebtn").onclick = function(){
		var popup = document.getElementById("popup");
		popup.style.display="none";
	}
}
document.getElementById("openbtn").click();
*/