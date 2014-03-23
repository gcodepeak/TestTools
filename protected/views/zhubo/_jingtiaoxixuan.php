<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<?php 
//$tags = Tool::getTags(array());

//print_r($tags);

$index = 0;
foreach ($dataProvider as $data){
?>

<div class="span3 category_div">
    <div class="category_image_div_big" cover-text="<?php echo $data['name']?>">
        <div class="category_image_big">
            <a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$data['id'],))?>" target="_blank"><img src="<?php echo $data['head_img']?>" alt="<?php echo $data['name']?>" />
			<div class="category_image_title">
                <span><?php echo Tool::getName($data['name']);?></span>
                <b class="gz_bt" rel="id1"></b>
            </div>
            <!-- ?php if ($data['is_live']) {?>
				<b class="live_image_icon"></b>
			<!--?php }?-->
            </a>  
		</div>
	</div>
	<div class="category_time_div clearfix">
		<div class="category_time_div_left"><span class="kb_time_s">开播:</span><span class="kb_time"><?php echo substr($data['last_live_time'], -8, 5);?></span><span class="icon icon_split"></span></div>
		<div class="category_time_div_right"><span class="icon icon_peo"></span><span><?php echo number_format($data['hots'])?></span></div>
	</div>
    <div class="category_tag_div">
        <!-- span class="c_tag1"><a href="#">小清新</a></span>
        <span class="c_tag2"><a href="#">活泼</a></span>
        <span class="c_tag3"><a href="#">骨子里</a></span-->
<?php 
	if (isset($data['tagids'])){
		$count = count($data['tagids']);
		$length = 0;
		for ( $i = 0; $i < $count; $i++){
			$length += strlen($data['tags'][$i]);
			// 最佳新人下面的标签最多只能显示10个字，每个字占3个字节
			if ($length > 3 * 10){
				break;
			}
			
			print '<span class="c_tag'. ($i + 1). '"><a href="#">'. $data['tags'][$i] .'</a></span>';
		}
	}
?>
    </div>
</div>

<?php
	$index++;
}
?>