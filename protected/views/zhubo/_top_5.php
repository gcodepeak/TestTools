<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<?php if ($index == 0) { ?>
<div style="height:190px">
	<div class="col-md-1 bg-pink" style="height:116px;padding-left:1px;">
		<span class="fs26" style="color:white;text-align:center;"><?php echo $index + 1;?></span>
	</div>
<?php }else { ?>
<div style="height:65px">
	<div class="col-md-1 bg-gray" style="height:50px;padding-left:1px;">
		<span class="fs22" style="color:white;text-align:center;"><?php echo $index + 1;?></span>
	</div>
<?php } ?>
	
<?php if ($index == 0) { ?>
	<div class="col-md-11" style="height:190px;">
		<div class="row" style="width: 153px; height: 115;margin-botom:5px">
			<a href="<?php echo $data->url;?>"><img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube_right.png"></a>
		</div>
<?php }else { ?>
	<div class="col-md-11" style="height:60px; margin-bottom:13px">
<?php } ?>
		<div class="row" style="padding-left:6px">
			<a href="<?php echo $data->url;?>"><span class="fs16"><?php echo $data->name;?></span></a>
		</div>
		<div class="row gray" style="padding-left:6px">
			<span>选自/<?php echo $data->site_id;?></span>
		</div>
		<div class="row gray" style="padding-left:6px">
			<span>粉丝/<?php echo $data->fans;?></span>
		</div>
	</div>
</div>