var ua = navigator.userAgent.toLowerCase(),
    win = /(Win|WIN|Windows|win|winNT).*?([\d.]+)/;
if(ua.match(win)!== null){
	var link = document.createElement("link");
	link.rel = "stylesheet";
	link.type = "text/css";
	link.href = "../../../../e/extend/tibetan-style/css/front-end-win.css";
	link.media = "all";
	var head = document.getElementsByTagName("head")[0];
	head.appendChild(link);
}
