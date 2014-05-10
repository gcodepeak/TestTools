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
					<span><?php echo Tool::getSmallName($data['name']);?></span> <b class="gz_bt" rel="id1"></b>
				</div> 
				<?php if ($data['is_live']) {?>
				<b class="new_peo_image_icon"></b>
				<?php }?>
			</a>
		</div>
	</div>
	<div class="category_time_div new_peo_time_div clearfix">
		<div class="category_time_div_left"><span class="kb_time_s">开播:</span><span class="kb_time"><?php echo substr($data['last_live_time'],-8,5);?></span><!--span class="icon icon_split"></span--></div>
		<div class="category_time_div_right"><span class="icon icon_peo"></span><span><?php echo number_format($data['hots'])?></span></div>
	</div>
	<div class="category_tag_div new_peo_tag">
		<!-- span class="c_tag1"><a href="#">小清新</a></span>
		<span class="c_tag2"><a href="#">活泼</a></span>
		<span class="c_tag3"><a href="#">骨子里</a></span-->
<?php 
	if (isset($data['tagids'])){
		$count = count($data['tagids']);
		$length = 0;
		for ( $i = 0; $i < $count; $i++){
			$length += strlen($data['tags'][$i]);
			// 最佳新人下面的标签最多只能显示7个字，每个字占3个字节
			if ($length > 3 * 7){
				break;
			}
			$url = Yii::app()->createUrl("/tagedzhubo/index",array('tagName'=>$data['tags'][$i])) ;
			print '<span class="c_tag'. ($i + 1). '"><a href="'.$url.'">'. $data['tags'][$i] .'</a></span>';
		}
	}
?>
	</div>
</div>

<?php
	$index ++;
}
?>