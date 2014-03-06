<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<?php if ($index == 0) { ?>
<div class="clearfix">
	<div class="list_left">
		<span class="list_left_span"><?php echo $index+1;?></span>
	</div>
	<div class="list_right">
		<div class="new_peo_image_div" cover-text="<?php echo $data->name;?>">
			<div class="new_peo_image_big">
				<a nobod="1" href="http://www.meilizhubo.com/zhibo/zhibo/956"
					target="_blank"><img
					src="http://uface.xiu.56img.com/photo/63/64/xqy907447579_b_56.com_.jpg?20140127"
					alt="<?php echo $data->name;?>">
					<div class="new_peo_image_title">
						<span><?php echo $data->name;?></span> <b class="gz_bt" rel="id1"></b>
					</div> <b class="new_peo_image_icon"></b> </a>
			</div>
		</div>
		<div class="list_cont">
			<div>
				<span class="span_left">选自/</span><span class="span_right"><?php echo $data->showSite->name;?></span>
			</div>
			<div>
				<span class="span_left">粉丝/</span> <span class="span_right"><?php echo $data->fans;?></span>
				<span class="span_icon"></span>
			</div>
		</div>
	</div>
</div>
<?php }else { ?>
<div class="list_noimg clearfix">
	<div class="list_left list_pt">
		<span class="list_left_span"><?php echo $index;?></span>
	</div>
	<div class="list_right">
		<div class="list_cont list_cont_pt">
			<div class="new_peo_image_title list_img_pt">
				<span><a href="#"><?php echo $data->name;?></a></span> <b
					class="gz_bt" rel="id1"></b>
			</div>
			<div>
				<span class="span_left">选自/</span><span class="span_right"><?php echo $data->showSite->name;?></span>
			</div>
			<div>
				<span class="span_left">粉丝/</span> <span class="span_right"><?php echo $data->fans;?></span>
				<span class="span_icon"></span>
			</div>
		</div>
	</div>
</div>
<?php } ?>