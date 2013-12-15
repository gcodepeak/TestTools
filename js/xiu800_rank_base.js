function getByClass(obj,cls){
	var oParent=obj||document,
	aTag=oParent.getElementsByTagName('*'),
	i=0,
	result=[],
	reg=new RegExp('\\b'+cls+'\\b');
	for(var i=0;i<aTag.length;i++){
		if(reg.test(aTag[i].className)){
			result.push(aTag[i]);
		}
	}
	return result;
}
function hasClass(obj,cls){
	var reg=new RegExp('\\b'+cls+'\\b');
	if(reg.test(obj.className)){
		return true;
	}
	return false;
}
function removeClass(obj,cls){
	var str=obj.className;
	if(!str){
		return;
	}
	var aClass=str.split(' ');
	for(var i=0;i<aClass.length;i++){
		if(aClass[i]==cls){
			aClass.splice(i,1);
		}
	}
	var newClass=aClass.join(' ');
	obj.className=newClass;
}
function addClass(obj,cls){
	if(hasClass(obj,cls)){
		return;
	}
	obj.className=cls+' '+obj.className;
}
function tabSwitch(id){
	var oWrap = document.getElementById(id);
	var aTab = oWrap.getElementsByTagName('ul')[0].getElementsByTagName('li');
	var aCont = getByClass(oWrap,'levels_body');
	for(var i = 0;i<aTab.length;i++){
		aTab[i].index=i;
		aTab[i].onmouseover=function(){
			for(var i=0;i<aTab.length;i++){
				removeClass(aTab[i],'active');
				aCont[i].style.display='none';
			}
			addClass(this,'active');
			aCont[this.index].style.display='block';
		};
	}
}