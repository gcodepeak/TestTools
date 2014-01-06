<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<div class="col-md-3" style="margin-bottom:20px">
	<!-- ul class="post big-post" -->
	
	<div class="row" cover-text="<?php echo $data->name?>">
		<p class="zhubo">
		<a href="<?php echo $data->url?>" target="_blank"><img style="width: 235px; height: 180px;"
			src="<?php echo $data->head_img?>" alt="<?php echo $data->name?>" />
			<em class="bg"></em>
			<em class="viewer"><em style="right:215px;"><?php echo $data->site_id;?></em><i></i><?php echo $data->hots?></em>
			<em class="play"></em>
		</a>
		</p>
	</div>
	<div class="row gray">
		<span class="fs16"><?php echo $data->name?></span>
	</div>
	<div class="row gray">
		<span>开播:<?php echo $data->last_live_time?></span>
	</div>
</div>