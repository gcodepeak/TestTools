function writeRandomColor(){
	var rand = Math.round(Math.random() * 0x1000000);
	var color = "00000".concat(rand.toString(16));
	document.write("#" + color.substr(color.length - 6, 6));
}