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
					<span><?php echo Tool::getSmallName($data['name']);?></span>
				</div> 
				<?php if ($data['is_live']) {?>
				<b class="new_peo_image_icon"></b>
				<?php }?>
			</a>
		</div>
	</div>
</div>

<?php
	$index ++;
}
?>
