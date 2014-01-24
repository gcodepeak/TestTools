<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<div class="span3" style="margin-bottom:20px;<?php if ($index % 4 == 0) echo 'margin-left:0px;'?>">
	<!-- ul class="post big-post" -->
	
	<div class="row-fluid" cover-text="<?php echo $data->name?>">
		<p class="zhubo" style="width: 235px; height: 180px;">
		<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$data->id,))?>" target="_blank"><img style="width: 235px; height: 180px; border:#E5E5E5 1px solid"
			src="<?php echo $data->head_img?>" alt="<?php echo $data->name?>" />
			<em class="bg"></em>
			<em class="showSiteName"><?php echo $data->showSite->name;?></em>
			<em class="viewer"><i></i><?php echo $data->hots?></em>
			<em class="play"></em>
		</a>
		</p>
	</div>
	<div class="row-fluid">
		<span style="color:#666;font-size:20px;"><?php echo $data->name?></span>
	</div>
	<div class="row-fluid">
		<span style="color:#999;font-size:16px;">开播:<?php echo $data->last_live_time?></span>
	</div>
</div>