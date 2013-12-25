<?php
/* @var $this ZhuboController */
/* @var $dataProvider CActiveDataProvider */

?>
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/homepage.css" />
<!--link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/common_moko.css" /-->

<!-- top 14 -->
<div class="head_top_N">
	<?php	
		$this->renderPartial("_top_14"); 
	?>
</div>

<div class="container">
      <div class="row">
        <div class="col-md-10">
        	<!-- 精挑细选部分 -->
        	<div class="row" style="margin-top: 20px; margin-bottom: 20px;">
        		<div class="col-md-3"><span style="font-size: 26px;">精挑细选</span></div>
        		<div class="col-md-2"><span class="zhubo_tag">好声音</span></div>
        		<div class="col-md-2"><span class="zhubo_tag">小清新</span></div>
        		<div class="col-md-2"><span class="zhubo_tag">活泼范</span></div>
        		<div class="col-md-2"><span class="zhubo_tag">气质型</span></div>
        	</div>
        	
        	
        	<div class="row" id="jingtiaoxixuan">
        		<?php $this->widget ( 'zii.widgets.CListView', array (
						'dataProvider' => $dataProvider,
						'enablePagination'=>false,
						'itemView' => '_jingtiaoxixuan_view',
        				'summaryText'=>'',
				));?>
        	</div><!--/row-->
        	
        	<!-- 最佳新人部分 -->    	      
		    <hr color=#99CC33 size=3>
		    <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
        		<div class="col-md-3"><span style="font-size: 26px;">最佳新人</span></div>
        		<div class="col-md-9 pull-right">
        			<a href="" target="_blank" hidefocus="true">一周内</a>|
					<a href="" target="_blank" hidefocus="true">两周内</a>|
					<a href="" target="_blank" hidefocus="true">一月内</a>|
        		</div>
        	</div> 
		    <div class="row" id="zuijiaxinren">
		    	<?php $this->widget ( 'zii.widgets.CListView', array (
						'dataProvider' => $dataProvider,
						'enablePagination'=>false,
						'itemView' => '_zuijiaxinren_view',
        				'summaryText'=>'',
				));?>
		    </div>
        </div><!--/span-->
        
        <div class="col-md-2" id="right_top5" style="margin-top:20px">
        	<div class="row green"><span class="fs22">MTop 5</span></div>
		    <div class="row gray"><span class="fs22">本周人气主播排行</span></div>
		    <div class="row" id="top_hots_5">
        		<?php $this->widget ( 'zii.widgets.CListView', array (
						'dataProvider' => $dataProvider,
						'enablePagination'=>false,
						'itemView' => '_top_5',
        				'summaryText'=>'',
				));?>
        	</div><!--/row-->
		        	
			<div class="row green"><span class="fs22">$Top 5</span></div>
		    <div class="row gray"><span class="fs22">本周财富主播排行</span></div>
		    <div class="row" id="top_wealth_5">
        		<?php $this->widget ( 'zii.widgets.CListView', array (
						'dataProvider' => $dataProvider,
						'enablePagination'=>false,
						'itemView' => '_top_5',
        				'summaryText'=>'',
				));?>
        	</div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->     
</div>


<!-- 
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


 -->