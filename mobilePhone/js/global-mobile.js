
	if(window.orientation===0 || window.orientation===180 || window.orientation == undefined){
		let size = document.body.clientWidth / 750 * 100
		document.getElementsByTagName("html")[0].style.fontSize = size + "px";
	}
	if(window.orientation===90  ||  window.orientation===-90){
		let size = document.body.clientWidth / 1334 * 100
		document.getElementsByTagName("html")[0].style.fontSize = size + "px";
	}
	window.addEventListener("onorientationchange" in window? "orientationchange":"resize",function(){
		setTimeout(function(){
				if(window.orientation===0 || window.orientation===180){
					let size = document.body.clientWidth / 750 * 100
					document.getElementsByTagName("html")[0].style.fontSize = size + "px";
				}
				if(window.orientation===90  ||  window.orientation===-90){
					let size = document.body.clientWidth / 1334 * 100
					document.getElementsByTagName("html")[0].style.fontSize = size + "px";
				}
		},300)
	}, false);