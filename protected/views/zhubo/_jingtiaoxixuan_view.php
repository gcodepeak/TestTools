<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<ul class="post big-post">
	<div class="cover" cover-text="<?php echo $data->name?>" cover-girl-text="">
		<a href="<?php echo $data->url?>" hidefocus="true" target="_blank"><img
			src="<?php echo $data->head_img?>"
			alt="<?php echo $data->name?>" /></a>
	</div>
	<li><label>秀场/</label><a href="<?php echo $data->site_id?>" title="<?php echo $data->site_id?>"
		hidefocus="true" class="nickname" target="_blank"><?php echo $data->site_id?></a></li>
	<li><label>等级/</label><span><?php echo $data->level?></span></li>
	<li><label>粉丝/</label><span><?php echo $data->fans?></span></li>
</ul>