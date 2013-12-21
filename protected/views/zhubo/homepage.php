<?php
/* @var $this ZhuboController */
/* @var $dataProvider CActiveDataProvider */

?>
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/homepage.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/common_moko.css" />

<div class="index-module">
	<h3>
		<a href="" hidefocus="true" class="title"
			target="_blank">精挑细选</a>
		<div class="vocation-mark">
			<span class="fll"><a href="">全部 ></a></span> <a
				class="mark c66dfff-bg" href=""> <span></span>好声音<span></span>
			</a> <a class="mark cf09-bg" href=""> <span></span>小清新<span></span>
			</a> <a class="mark cfc0-bg" href=""> <span></span>活泼范<span></span>
			</a> <a class="mark c9c0-bg" href=""> <span></span>气质型<span></span>
			</a>
		</div>
	</h3>
	<div class="w970">
		<?php
		$this->widget ( 'zii.widgets.CListView', array (
				'dataProvider' => $dataProvider,
				//'enablePagination'=>false,
				'itemView' => '_jingtiaoxixuan_view' 
		) );?>
	</div>
</div>

<div class="index-module msp-module">
	<h3>
		<a href="" hidefocus="true" class="title" target="_blank">最佳新人</a>
		<div class="place">
			<a href="" target="_blank" hidefocus="true">一周内</a>|
			<a href="" target="_blank" hidefocus="true">两周内</a>|
			<a href="" target="_blank" hidefocus="true">一月内</a>|
		</div>
	</h3>
	<div class="w970">
		<?php
		$this->widget ( 'zii.widgets.CListView', array (
				'dataProvider' => $dataProvider,
				//'enablePagination'=>false,
				'itemView' => '_jingtiaoxixuan_view' 
		) );?>
	</div>
</div>

<div class="index-module mtg5-module">
	<h3>
		<a href="" hidefocus="true" class="title" target="_blank">主播家族</a>
		<div class="place">
			<a href="" target="_blank" hidefocus="true">主播最多</a>|
			<a href="" target="_blank" hidefocus="true">粉丝最多</a>|
			<a href="" target="_blank" hidefocus="true">大富大贵</a>|
			<a href="" target="_blank" hidefocus="true">历史悠久</a>|
		</div>
	</h3>
</div>

<div class="">
	<h3>
		<p>M Top 5</p>
		<p>本周人气主播排行</p>
	</h3>
</div>

<div class="">
	<h3>
		<p>$ Top 5</p>
		<p>本周财富主播排行</p>
	</h3>
</div>