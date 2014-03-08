<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<?php 
$index = 0;
foreach ($dataProvider as $data){
?>

<?php if ($index == 0) { ?>
<div class="clearfix">
	<div class="list_left">
		<span class="list_left_span"><?php echo $index+1;?></span>
	</div>
	<div class="list_right">
		<div class="new_peo_image_div" cover-text="<?php echo $data['name'];?>">
			<div class="new_peo_image_big">
				<a nobod="1" href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$data['id'],))?>"
					target="_blank"><img
					src="<?php echo $data['head_img'];?>"
					alt="<?php echo $data['name'];?>">
					<div class="new_peo_image_title">
						<span><?php echo $data['name'];?></span> <b class="gz_bt" rel="id1"></b>
					</div> <b class="new_peo_image_icon"></b> </a>
			</div>
		</div>
		<div class="list_cont">
			<div>
				<span class="span_left">选自/</span><span class="span_right"><?php echo $data['showSiteName'];?></span>
			</div>
			<div>
				<span class="span_left">粉丝/</span> <span class="span_right"><?php echo $data['fans'];?></span>
				<span class="span_icon"></span>
			</div>
		</div>
	</div>
</div>
<?php }else { ?>
<div class="list_noimg clearfix">
	<div class="list_left list_pt">
		<span class="list_left_span"><?php echo $index+1;?></span>
	</div>
	<div class="list_right">
		<div class="list_cont list_cont_pt">
			<div class="new_peo_image_title list_img_pt">
				<span><a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$data['id'],))?>"><?php echo $data['name'];?></a></span> <b
					class="gz_bt" rel="id1"></b>
			</div>
			<div>
				<span class="span_left">选自/</span><span class="span_right"><?php echo $data['showSiteName'];?></span>
			</div>
			<div>
				<span class="span_left">粉丝/</span> <span class="span_right"><?php echo $data['fans'];?></span>
				<span class="span_icon"></span>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<?php
	$index++;
}
?>