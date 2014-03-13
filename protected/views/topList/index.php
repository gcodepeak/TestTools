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
			<div class="top_con_title">
				<span>ALL</span><span>可爱</span><span>妩媚</span><span>女神</span><span>好声音</span>
			</div>
			<div class="top_con_img clearfix">	
				<?php
					$index = 0;
					for($index = 0; $index < 5; $index++) {
						$this->renderPartial("_top_list",
							array('dataProvider'=>$dataProvider[$index]));
					} 
				?>
			</div>

			<!--广告-->
			<div class="top_con_top_ad">
				<img src="/images/toplist_ad.png" alt="">
			</div>

			<!--广告下部分内容-->
			<div class="top_con_title">
				<span>气质</span><span>熟女</span><span>甜美</span><span>巧嘴</span><span>娇滴滴</span>
			</div>
			<div class="top_con_img clearfix">	
				<?php
					$index = 0;
					for($index = 0; $index < 5; $index++) {
						$this->renderPartial("_top_list",
							array('dataProvider'=>$dataProvider[$index+5]));
					} 
				?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
 	//测试点击切榜，只用于测试，页面加载可以输出在html上,或者用于榜单的异步请求
        $(".top_month_bt").click(function(){
            $(this).addClass("select");
            $(".top_week_bt").removeClass("select");
        });
        $(".top_week_bt").click(function(){
            $(this).addClass("select");
            $(".top_month_bt").removeClass("select");
        });
</script>
