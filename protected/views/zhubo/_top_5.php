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
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube_right.png">
		</div>
<?php }else { ?>
	<div class="col-md-11" style="height:60px; margin-bottom:13px">
<?php } ?>

		<div class="row" style="padding-left:6px">
			<span class="fs16"><?php echo $data->name;?></span>
		</div>
		<div class="row gray" style="padding-left:6px">
			<span>选自/<?php echo $data->site_id;?></span>
		</div>
		<div class="row gray" style="padding-left:6px">
			<span>粉丝/<?php echo $data->fans;?></span>
		</div>
	</div>
</div>


<!-- div class="container top14">
	<ul>
		<li class="head_cube doublesize" style="top: 0px; left: 0px;" data-id="0">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube_double.png">
		</li>
		<li class="head_cube" style="top: 0px; left: 300px;" data-id="1">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
		</li>
		<li class="head_cube" style="top: 0px; left: 450px;" data-id="1">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
		</li>
		<li class="head_cube" style="top: 0px; left: 600px;" data-id="1">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
		</li>
		<li class="head_cube doublesize" style="top: 0px; left: 750px;" data-id="1">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube_double.png">
		</li>
		<li class="head_cube" style="top: 0px; left: 1050px;" data-id="1">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
		</li>
	</ul>
</div>
-->	