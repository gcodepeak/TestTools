<?php
/* @var $this ZhuboController */
/* @var $model Zhubo */
/* @var $form CActiveForm */
?>
<form id="tag-form" action="/zhuboTag/toTag" method="get">

	<div class="row">		
		<label for="Zhubo_local_id">原始ID</label>		
		<input size="10" maxlength="10" name="Zhubo[local_id]" id="Zhubo_local_id" type="text" />

		<label for="Zhubo_name">昵称</label>		
		<input size="10" maxlength="64" name="Zhubo[name]" id="Zhubo_name" type="text" />
		
		<label for="Zhubo_level">等级</label>		
		<input size="3" name="Zhubo[level]" id="Zhubo_level" type="text" />

		<label for="Zhubo_wealth_level">财富等级</label>		
		<input size="3" name="Zhubo[wealth_level]" id="Zhubo_wealth_level" type="text" />

		<label for="Zhubo_time_level">时间等级</label>		
		<input size="3" name="Zhubo[time_level]" id="Zhubo_time_level" type="text" />

		<label for="Zhubo_hots">关注数</label>		
		<input size="5" maxlength="10" name="Zhubo[hots]" id="Zhubo_hots" type="text" />

		<label for="Zhubo_fans">粉丝数</label>		
		<input size="5" maxlength="10" name="Zhubo[fans]" id="Zhubo_fans" type="text" />			

		<label for="Zhubo_news_num">动态数</label>		
		<input size="5" maxlength="10" name="Zhubo[news_num]" id="Zhubo_news_num" type="text" />		

		<label for="Zhubo_tags">原始标签</label>		
		<input size="20" maxlength="128" name="Zhubo[tags]" id="Zhubo_tags" type="text" />
		
		<input type="submit" name="yt0" value="高级搜索" />	
	</div>

</form><!-- search-form -->