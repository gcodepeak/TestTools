<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<?php if ($index == 0) { ?>
<div style="height:116px;margin-bottom:22px;">
	<div class="span2" style="width:20px;height:116px;margin:0 0 82px 0;padding-left:2px;background-color:#ffdee5;">
		<span class="fs26" style="color:white;text-align:center;"><?php echo $index + 1;?></span>
	</div>
<?php }else { ?>
<div style="height:60px;margin-bottom:22px;">
	<div class="span2 bg-gray" style="width:20px;height:60px;margin:0 auto;padding-left:2px;">
		<span class="fs22" style="color:white;text-align:center;"><?php echo $index + 1;?></span>
	</div>
<?php } ?>
	
<?php if ($index == 0) { ?>
	<div class="span10" style="width:153px;height:178px;margin:0 0 20px 0;">
		<div class="row-fluid" style="width: 150px; height: 114px;margin-left:1px;margin-botom:4px;border:#E5E5E5 1px solid;">
			<a href="<?php echo $data->url;?>"><img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube_right.png"></a>
		</div>
<?php }else { ?>
	<div class="span10" style="height:60px; margin:0 0 20px 0;">
<?php } ?>
		<div class="row-fluid" style="padding-left:6px;margin-top:2px;margin-bottom:6px;">
			<a href="<?php echo $data->url;?>"><span class="fs16"><?php echo $data->name;?></span></a>
		</div>
		<div class="row-fluid gray" style="padding-left:6px;margin-bottom:4px;">
			<span style="color:#cbcbcb;font-size:12px;">选自/</span><span style="color:#999;font-size:12px;"><?php echo $data->site_id;?></span>
		</div>
		<div class="row-fluid gray" style="padding-left:6px">
			<span style="color:#cbcbcb;font-size:12px;">粉丝/</span><span style="color:#999;font-size:12px;"><?php echo $data->fans;?></span>
		</div>
	</div>
</div>