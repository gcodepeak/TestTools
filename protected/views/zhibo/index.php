<?php
/* @var $this ZhiboController */
?>
<script>
		window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89343201.js?cdnversion='+~(-new Date()/36e5)];
</script>

<div class="container" style="width: 100%;padding: 0 15px;">
	<div class="row">
		<div class="col-md-2" style="background-color: #eee;">
			<div class="row" style="background-color: #BA2C49;">
				<div class="col-md-8">
					<a href="<?php echo Yii::app()->createUrl('zhubo/homepage')?>"><img style="width: 90px; height: 30px; border:#E5E5E5 1px solid"
					src="<?php echo Yii::app()->request->baseUrl;?>/images/logo.png"></img></a>
				</div>
				<div class="col-md-4 pull-right">
					<a class="btn" href="#" role="button">+收藏</a>
				</div>
			</div>
			
			<!-- 当前主播信息 -->
			<div class="row" style="margin-left: 20px;">
					<div class="row" style="margin-top:10px;margin-bottom:10px;">
						<span class="fs22" style="color:#BA2C49;"><?php echo $zhubo->name;?></span>
					</div>
					<div class="row gray" style="margin-top:5px;margin-bottom:5px;">
						<span>网站来源&nbsp/&nbsp</span><span style="color:#BA2C49"><?php echo $zhubo->site_id;?> </span>
					</div>
					<div class="row gray" style="margin-top:5px;margin-bottom:5px;">开播时间&nbsp/&nbsp 00:00</div>
					<div class="row gray" style="margin-top:5px;margin-bottom:5px;">观众人数&nbsp/&nbsp<?php echo $zhubo->hots;?></div>
					<div class="row gray" style="margin-top:5px;margin-bottom:5px;">喜欢就分享到</div>
					<div class="bdsharebuttonbox">
						<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
						<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
						<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
						<a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
					</div>
					<div class="row gray" style="margin-top:15px;margin-bottom:5px;">换一换看看</span></div>
			</div>
			
			<!-- 换一换主播 -->				
			<div class="row" id='random' style="margin-top: 5px;">
				<div class="t-reco">
					<span class="btn-co pre"></span>
		        	<?php	
						$this->renderPartial("_zhubo",
							array('dataProvider'=>$dataProvider));
					?>
				</div>
        	</div>

			
			
			<!-- 广告 -->
			<div class="row" style="border: 1px solid;width:95%;height:200px;margin-left:5px">
			</div>
			
		</div>

		<div class="col-md-10">			
			<iframe id="zhibo_id" name="_zhibo_target" src="<?php echo $zhubo->url;?>" 
				style="width:100%;height:700px;border:0px solid #fff;">
				
			</iframe>
		</div>
	</div>
</div>

<script type="text/javascript"> 
//下面这段代码可以实现IFrame自适应高度，即随着页面的长度，自动适应以免除页面和IFrame同时出现滚动条。  
//源代码如下:  
//** iframe自动适应页面 **//  
//输入你希望根据页面高度自动调整高度的iframe的名称的列表  
//用逗号把每个iframe的ID分隔. 例如: ["myframe1", "myframe2"]，可以只有一个窗体，则不用逗号。  
//定义iframe的ID  
var iframeids=["zhibo_room"]  
//如果用户的浏览器不支持iframe是否将iframe隐藏 yes 表示隐藏，no表示不隐藏  
var iframehide="yes"  
function dyniframesize()  
{  
var dyniframe=new Array()  
for (i=0; i<iframeids.length; i++)  
{  
if (document.getElementById)  
{  
//自动调整iframe高度  
dyniframe[dyniframe.length] = document.getElementById(iframeids);  
if (dyniframe && !window.opera)  
{  
dyniframe.style.display="block"  
if (dyniframe.contentDocument && dyniframe.contentDocument.body.offsetHeight) //如果用户的浏览器是NetScape  
dyniframe.height = dyniframe.contentDocument.body.offsetHeight;  
else if (dyniframe.Document && dyniframe.Document.body.scrollHeight) //如果用户的浏览器是IE  
dyniframe.height = dyniframe.Document.body.scrollHeight;  
}  
}  
//根据设定的参数来处理不支持iframe的浏览器的显示问题  
if ((document.all || document.getElementById) && iframehide=="no")  
{  
var tempobj=document.all? document.all[iframeids] : document.getElementById(iframeids)  
tempobj.style.display="block"  
}  
}  
}  
if (window.addEventListener)  
window.addEventListener("load", dyniframesize, false)  
else if (window.attachEvent)  
window.attachEvent("onload", dyniframesize)  
else  
window.onload=dyniframesize  
</script>
