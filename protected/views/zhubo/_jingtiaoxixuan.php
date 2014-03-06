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
            <a href="http://www.meilizhubo.com/zhibo/zhibo/956" target="_blank"><img src="http://uface.xiu.56img.com/photo/63/64/xqy907447579_b_56.com_.jpg?20140127" alt="<?php echo $data['name']?>" />
			<div class="category_image_title">
                <span><?php echo $data['name']?></span>
                <b class="gz_bt" rel="id1"></b>
            </div></a>
            
		</div>
	</div>
	<div class="category_time_div">
		<span class="kb_time_s">开播:</span><span class="kb_time"><?php echo $data['last_live_time'];?></span><span class="icon icon_split"></span><span class="icon icon_peo"></span><span><?php echo $data['hots']?></span>
	</div>
    <div class="category_tag_div">
        <span class="c_tag1">小清新</span><span class="c_tag2">活泼</span><span class="c_tag3">骨子里</span>
    </div>
</div>

<?php
	$index++;
}
?>