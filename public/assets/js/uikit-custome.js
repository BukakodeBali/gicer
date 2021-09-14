window.onscroll = function (e) {
	var btn = document.getElementById("btn-to-top");
	if (window.pageYOffset >= 400) {
		btn.classList.add("show-btn");
	}else{
		btn.classList.remove("show-btn");
	}
}