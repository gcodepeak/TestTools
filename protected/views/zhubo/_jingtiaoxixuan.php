<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<?php 
$index = 0;
foreach ($dataProvider as $data){
?>

<div class="span3 category_div">
    <div class="category_image_div_big" cover-text="<?php echo $data['name']?>">
        <div class="category_image_big">
            <a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$data['id'],))?>" target="_blank"><img src="<?php echo $data['head_img']?>" alt="<?php echo $data['name']?>" />
			<div class="category_image_title">
                <span><?php echo $data['name']?></span>
                <b class="gz_bt" rel="id1"></b>
            </div></a>
            
		</div>
	</div>
	<div class="category_time_div clearfix">
		<div class="category_time_div_left"><span class="kb_time_s">开播:</span><span class="kb_time"><!-- ?php echo $data['last_live_time'];?--></span><span class="icon icon_split"></span></div>
		<div class="category_time_div_right"><span class="icon icon_peo"></span><span><?php echo $data['hots']?></span></div>
	</div>
    <div class="category_tag_div">
        <span class="c_tag1"><a href="#">小清新</a></span>
        <span class="c_tag2"><a href="#">活泼</a></span>
        <span class="c_tag3"><a href="#">骨子里</a></span>
    </div>
</div>

<?php
	$index++;
}
?>

<script>
	imageHover();
</script>