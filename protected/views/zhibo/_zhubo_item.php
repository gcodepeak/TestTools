<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<div style="margin-bottom:10px;margin-left:20px;">
	<div class="row-fluid" cover-text="<?php echo $data->name?>">
		<p class="best_newer" style="width: 153px; height: 115px;">
		<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$data->id,))?>" target="_blank"><img style="width: 153px; height: 115px; border:#E5E5E5 1px solid;"
			src="<?php echo $data->head_img?>" alt="<?php echo $data->name?>" />
			<em class="bg"></em>
			<em class="showSiteName"><?php echo $data->showSite->name;?></em>
			<em class="viewer"><i></i><?php echo $data->hots?></em>
			<em class="play"></em>
		</a>
		</p>
	</div>
</div>