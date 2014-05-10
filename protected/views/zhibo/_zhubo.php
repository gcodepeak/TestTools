<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<?php 
$index = 0;
foreach ($dataProvider as $data){
?>

<div class="new_peo_div<?php if($index!=0) echo $index?>">
	<div class="new_peo_image_div" cover-text="<?php echo $data['name']?>">
		<div class="new_peo_image_big">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$data['id'],))?>" target="_blank"><img
				src="<?php echo $data['head_img']?>"
				alt="<?php echo $data['name']?>">
				<div class="new_peo_image_title">
					<span><?php echo Tool::getName($data['name'])?></span>
					<b class="gz_bt" rel="id1" title="加入关注"></b>
				</div><b class="new_peo_image_icon"></b></a>
		</div>
	</div>
</div>

<?php
	$index++;
}
?>