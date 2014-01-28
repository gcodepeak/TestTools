<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<?php 
	$top14s = $dataProvider->getData();
?>

<div class="top14">
	<ul>
		<li class="head_cube doublesize top" style="top: 0px; left: 0px;" data-id="0">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[0]['id'],))?>" target="_blank">
				<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube_double.png" style="display: block;">
				<div class="overlay" style="color:#999;font-size:16px;">
					<p style="color:#333;font-size:20px;padding-top:20px;padding-bottom:16px;"><?php echo $top14s[0]->name;?></p>
					<div style="display:inline;">观众/<span style="color:#666;font-size:16px;"><?php echo $top14s[0]->fans;?></span></div>
					<div style="display:inline;margin-left:50px;">粉丝/<span style="color:#666;font-size:16px;"><?php echo $top14s[0]->fans;?></span></div>
					<p style="padding-top:10px;">选自/<span style="color:#666;font-size:16px;"><?php echo $top14s[0]->showSite->name;?></span></p>
				</div>
			</a>
			
		</li>
		<li class="head_cube top" style="top: 0px; left: 298px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[1]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			<div class="overlay " style="color:#999;">
				<p style="color:#333;font-size:14px;padding-top:10px;"><?php echo $top14s[1]->name;?></p>
				<p>观众/<span style="color:#666;font-size:12px;"><?php echo $top14s[1]->fans;?></span></p>
				<p>粉丝/<span style="color:#666;font-size:12px;"><?php echo $top14s[1]->fans;?></span></p>
				<p>选自/<span style="color:#666;font-size:12px;"><?php echo $top14s[1]->showSite->name;?></span></p>
			</div>
			</a>
		</li>
		<li class="head_cube top" style="top: 0px; left: 447px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[2]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			<div class="overlay " style="color:#999;">
				<p style="color:#333;font-size:14px;padding-top:10px;"><?php echo $top14s[2]->name;?></p>
				<p>观众/<span style="color:#666;font-size:12px;"><?php echo $top14s[2]->fans;?></span></p>
				<p>粉丝/<span style="color:#666;font-size:12px;"><?php echo $top14s[2]->fans;?></span></p>
				<p>选自/<span style="color:#666;font-size:12px;"><?php echo $top14s[2]->showSite->name;?></span></p>
			</div>
			</a>
		</li>
		<li class="head_cube top" style="top: 0px; left: 594px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[3]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			<div class="overlay " style="color:#999;">
				<p style="color:#333;font-size:14px;padding-top:10px;"><?php echo $top14s[3]->name;?></p>
				<p>观众/<span style="color:#666;font-size:12px;"><?php echo $top14s[3]->fans;?></span></p>
				<p>粉丝/<span style="color:#666;font-size:12px;"><?php echo $top14s[3]->fans;?></span></p>
				<p>选自/<span style="color:#666;font-size:12px;"><?php echo $top14s[3]->showSite->name;?></span></p>
			</div>
			</a>
		</li>
		<li class="head_cube doublesize top" style="top: 0px; left: 743px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[4]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube_double.png">
			<div class="overlay" style="color:#999;font-size:16px;">
				<p style="color:#333;font-size:20px;padding-top:20px;padding-bottom:16px;"><?php echo $top14s[4]->name;?></p>
				<div style="display:inline;">观众/<span style="color:#666;font-size:16px;"><?php echo $top14s[4]->fans;?></span></div>
				<div style="display:inline;margin-left:50px;">粉丝/<span style="color:#666;font-size:16px;"><?php echo $top14s[4]->fans;?></span></div>
				<p style="padding-top:10px;">选自/<span style="color:#666;font-size:16px;"><?php echo $top14s[4]->showSite->name;?></span></p>
			</div>
			</a>
		</li>
		<li class="head_cube top" style="top: 0px; left: 1041px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[5]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			<div class="overlay " style="color:#999;">
				<p style="color:#333;font-size:14px;padding-top:10px;"><?php echo $top14s[5]->name;?></p>
				<p>观众/<span style="color:#666;font-size:12px;"><?php echo $top14s[5]->fans;?></span></p>
				<p>粉丝/<span style="color:#666;font-size:12px;"><?php echo $top14s[5]->fans;?></span></p>
				<p>选自/<span style="color:#666;font-size:12px;"><?php echo $top14s[5]->showSite->name;?></span></p>
			</div>
			</a>
		</li>
		
		<!-- 第二行 -->
		<li class="head_cube top" style="top: 114px; left: 298px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[6]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			<div class="overlay " style="color:#999;">
				<p style="color:#333;font-size:14px;padding-top:10px;"><?php echo $top14s[6]->name;?></p>
				<p>观众/<span style="color:#666;font-size:12px;"><?php echo $top14s[6]->fans;?></span></p>
				<p>粉丝/<span style="color:#666;font-size:12px;"><?php echo $top14s[6]->fans;?></span></p>
				<p>选自/<span style="color:#666;font-size:12px;"><?php echo $top14s[6]->showSite->name;?></span></p>
			</div>
			</a>
		</li>
		<li class="head_cube doublesize top" style="top: 114px; left: 447px;" data-id="2">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[7]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube_double.png">
			<div class="overlay" style="color:#999;font-size:16px;">
				<p style="color:#333;font-size:20px;padding-top:20px;padding-bottom:16px;"><?php echo $top14s[7]->name;?></p>
				<div style="display:inline;">观众/<span style="color:#666;font-size:16px;"><?php echo $top14s[7]->fans;?></span></div>
				<div style="display:inline;margin-left:50px;">粉丝/<span style="color:#666;font-size:16px;"><?php echo $top14s[7]->fans;?></span></div>
				<p style="padding-top:10px;">选自/<span style="color:#666;font-size:16px;"><?php echo $top14s[7]->showSite->name;?></span></p>
			</div>
			</a>
		</li>
		<li class="head_cube top" style="top: 114px; left: 1041px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[8]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			<div class="overlay " style="color:#999;">
				<p style="color:#333;font-size:14px;padding-top:10px;"><?php echo $top14s[8]->name;?></p>
				<p>观众/<span style="color:#666;font-size:12px;"><?php echo $top14s[8]->fans;?></span></p>
				<p>粉丝/<span style="color:#666;font-size:12px;"><?php echo $top14s[8]->fans;?></span></p>
				<p>选自/<span style="color:#666;font-size:12px;"><?php echo $top14s[8]->showSite->name;?></span></p>
			</div>
			</a>
		</li>
		
		<!-- 第三行 -->
		<li class="head_cube top" style="top: 228px; left: 0px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[9]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			<div class="overlay " style="color:#999;">
				<p style="color:#333;font-size:14px;padding-top:10px;"><?php echo $top14s[9]->name;?></p>
				<p>观众/<span style="color:#666;font-size:12px;"><?php echo $top14s[9]->fans;?></span></p>
				<p>粉丝/<span style="color:#666;font-size:12px;"><?php echo $top14s[9]->fans;?></span></p>
				<p>选自/<span style="color:#666;font-size:12px;"><?php echo $top14s[9]->showSite->name;?></span></p>
			</div>
			</a>
		</li>
		<li class="head_cube top" style="top: 228px; left: 149px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[10]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			<div class="overlay " style="color:#999;">
				<p style="color:#333;font-size:14px;padding-top:10px;"><?php echo $top14s[10]->name;?></p>
				<p>观众/<span style="color:#666;font-size:12px;"><?php echo $top14s[10]->fans;?></span></p>
				<p>粉丝/<span style="color:#666;font-size:12px;"><?php echo $top14s[10]->fans;?></span></p>
				<p>选自/<span style="color:#666;font-size:12px;"><?php echo $top14s[10]->showSite->name;?></span></p>
			</div>
			</a>
		</li>
		<li class="head_cube top" style="top: 228px; left: 298px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[11]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			<div class="overlay " style="color:#999;">
				<p style="color:#333;font-size:14px;padding-top:10px;"><?php echo $top14s[11]->name;?></p>
				<p>观众/<span style="color:#666;font-size:12px;"><?php echo $top14s[11]->fans;?></span></p>
				<p>粉丝/<span style="color:#666;font-size:12px;"><?php echo $top14s[11]->fans;?></span></p>
				<p>选自/<span style="color:#666;font-size:12px;"><?php echo $top14s[11]->showSite->name;?></span></p>
			</div>
			</a>
		</li>
		<li class="head_cube top" style="top: 228px; left: 743px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[12]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			<div class="overlay " style="color:#999;">
				<p style="color:#333;font-size:14px;padding-top:10px;"><?php echo $top14s[12]->name;?></p>
				<p>观众/<span style="color:#666;font-size:12px;"><?php echo $top14s[12]->fans;?></span></p>
				<p>粉丝/<span style="color:#666;font-size:12px;"><?php echo $top14s[12]->fans;?></span></p>
				<p>选自/<span style="color:#666;font-size:12px;"><?php echo $top14s[12]->showSite->name;?></span></p>
			</div>
			</a>
		</li>
		<li class="head_cube top" style="top: 228px; left: 892px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[13]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			<div class="overlay " style="color:#999;">
				<p style="color:#333;font-size:14px;padding-top:10px;"><?php echo $top14s[13]->name;?></p>
				<p>观众/<span style="color:#666;font-size:12px;"><?php echo $top14s[13]->fans;?></span></p>
				<p>粉丝/<span style="color:#666;font-size:12px;"><?php echo $top14s[13]->fans;?></span></p>
				<p>选自/<span style="color:#666;font-size:12px;"><?php echo $top14s[13]->showSite->name;?></span></p>
			</div>
			</a>
		</li>
		<li class="head_cube" style="top: 228px; left: 1041px;" data-id="1">
			<span class="huanyihuan">
			<?php echo CHtml::ajaxLink(
			    "",  
			    array('zhubo/top_14'), // Yii URL  
			    array('update' => '#top_14'),// jQuery selector
			    //array('style' => "width:100%;height:100%;background-image:url(". Yii::app()->baseUrl ."/images/index01-huan.gif)")
				array('style' => "width:100%;height:100%;display:block;")
			); ?>
			</span>
		</li>
	</ul>
</div>

<script type="text/javascript">
//展示模块
$('li.top').each(function(){
	var $this = jQuery(this),$a = $this.find('a'),$overlay=$this.find('.overlay');
	
	if (!$this) {
		alert("error");
	}
	$a.hover(function(){
		//$overlay.toggle();
		$overlay.stop(true, true).slideDown(200);
	},function(){
		//$overlay.toggle();
		$overlay.stop(true, true).slideUp(200);
	});
});
</script>
