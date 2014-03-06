<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<?php 
$index = 0;
foreach ($dataProvider as $data){
?>

<div class="new_peo_div">
	<div class="new_peo_image_div" cover-text="<?php echo $data['name']?>">
		<div class="new_peo_image_big">
			<a
				href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$data['id'],))?>"
				target="_blank"> <img src="<?php echo $data['head_img']?>"
				alt="<?php echo $data['name']?>">
				<div class="new_peo_image_title">
					<span><?php echo $data['name']?></span> <b class="gz_bt" rel="id1"></b>
				</div> <b class="new_peo_image_icon"></b>
			</a>
		</div>
	</div>
	<div class="category_time_div new_peo_time_div">
		<span class="kb_time_s">开播:</span><span class="kb_time"><?php echo $data['last_live_time'];?></span><span
			class="icon icon_split"></span><span class="icon icon_peo"></span><span><?php echo $data['hots']?></span>
	</div>
	<div class="category_tag_div new_peo_tag">
		<span class="c_tag1">小清新</span><span class="c_tag2">活泼</span><span
			class="c_tag3">骨子里</span>
	</div>
</div>

<?php
	$index ++;
}
?>