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

function setHeight(){
	var oIframeBox=document.getElementById('iframeBox'),
	oPicWrap=document.getElementById('picWrap'),
	cH=document.documentElement.clientHeight,
	nowHeight=cH-360;
	oIframeBox.style.height=cH+'px';
	if(nowHeight<315){
		nowHeight=315;
		tabView(3);
	}
	else{
		var nums=Math.ceil(nowHeight/105);
		tabView(nums);
	}
	oPicWrap.style.height=nowHeight+'px';
}
function startMove(obj,json,endFn){
	clearInterval(obj.timer);
	obj.timer = setInterval(function(){
		var bBtn = true;
		for(var attr in json){
			var iCur = 0;
			if(attr == 'opacity'){
				if(Math.round(parseFloat(getStyle(obj,attr))*100)==0){
					iCur = Math.round(parseFloat(getStyle(obj,attr))*100);
				}else{
					iCur = Math.round(parseFloat(getStyle(obj,attr))*100) || 100;
				}	
			}else{
				iCur = parseInt(getStyle(obj,attr)) || 0;
			}
			var iSpeed = (json[attr] - iCur)/8;
			iSpeed = iSpeed >0 ? Math.ceil(iSpeed) : Math.floor(iSpeed);
			if(iCur!=json[attr]){
				bBtn = false;
			}
			if(attr == 'opacity'){
				obj.style.filter = 'alpha(opacity=' +(iCur + iSpeed)+ ')';
				obj.style.opacity = (iCur + iSpeed)/100;
			}else{
				obj.style[attr] = iCur + iSpeed + 'px';
			}
		}
		if(bBtn){
			clearInterval(obj.timer);
			if(endFn){
				endFn.call(obj);
			}
		}
	},30);
}
function getStyle(obj,attr){
	if(obj.currentStyle){
		return obj.currentStyle[attr];
	}else{
		return getComputedStyle(obj,false)[attr];
	}
}
function toFullScreen(){
	var d=document,$gid=function(id){return d.getElementById(id);}
	var cBtnClose=$gid('controlButtonClose');
	var cBtnOpen=$gid('controlButtonOpen');
	cBtnClose.onclick=function(){
		$gid('sider').style.display="none";
		$gid('iframeBox').style.width="98%";
		this.style.display="none";
		cBtnOpen.style.display="block";
	};
	cBtnOpen.onclick=function(){
		$gid('sider').style.display="block";
		$gid('iframeBox').style.width="auto";
		this.style.display="none";
		cBtnClose.style.display="block";
	};
}
function scrollToPos(){
	var d=document;
	var aLi=d.getElementById('picWrap').getElementsByTagName('li');
	var oWrap=document.getElementById("TabViewNext");
	var oUl=oWrap.getElementsByTagName('ul')[0];
	for(var i=0;i<aLi.length;i++){
		aLi[i].index=i;
		aLi[i].onclick=function(){
			for(var i=0;i<aLi.length;i++){
				removeClass(aLi[i],'on');
			}
			addClass(this,'on');
			if(this.index!=0&&this.index!=1&&this.index!=aLi.length-1){
				startMove(oUl,{top:-(this.index-1)*aLi[0].offsetHeight});
			}
		}
	}
}