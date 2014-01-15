<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<div class="col-md-9 col-md-offset-1" style="margin-bottom:10px">
	<div class="row" cover-text="<?php echo $data->name?>">
		<p class="best_newer">
		<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$data->id,))?>" target="_black"><img style="width: 153px; height: 115px; border:#E5E5E5 1px solid;"
			src="<?php echo $data->head_img?>" alt="<?php echo $data->name?>" />
			<em class="bg"></em>
			<em class="viewer"><em style="right:120px;"><?php echo $data->site_id;?></em><i></i><?php echo $data->hots?></em>
			<em class="play"></em>
		</a>
		</p>
	</div>
</div>