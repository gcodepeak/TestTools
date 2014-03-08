<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/toplist_new.css" />

<div class="list_content">
	<div class="list_con">
		<!--标题-->
		<div class="list_con_titlebar">
			<span class="list_c_t1">主播排行榜</span><span
				class="list_t_span month_cur"><a class="top_month_bt select"
				href="#"></a></span><span class="list_t_span week_cur"><a
				class="top_week_bt" href="#"></a></span> <span class="list_t_ad"> <img
				src="/images/list_ad.png" alt="">
			</span>
		</div>
		<!--图内容-->
		
		<div class="list_con_list clearfix">
			<!--广告上部分内容-->
			<div class="top_con_title"><span>活泼范</span><span>小清新</span><span>好声音</span><span>女神</span><span>气质型</span></div>
			<div class="top_con_img clearfix">	
				<?php
					$index = 0;
					for($index = 0; $index < 5; $index++) {
						$this->renderPartial("_top_list",
							array('dataProvider'=>$dataProvider));
					} 
				?>
			</div>
			
			<!--广告-->
			<div class="top_con_top_ad">
				<img src="/images/toplist_ad.png" alt="">
			</div>
			
			<!--广告下部分内容-->
			<div class="top_con_title"><span>活泼范</span><span>小清新</span><span>好声音</span><span>女神</span><span>气质型</span></div>
			<div class="top_con_img clearfix">	
				<?php
					$index = 0;
					for($index = 0; $index < 5; $index++) {
						$this->renderPartial("_top_list",
							array('dataProvider'=>$dataProvider));
					} 
				?>
			</div>
		</div>
	</div>	
	
</div>