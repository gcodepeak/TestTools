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

	</div>
</div>
<!-- ?php
	$this->renderPartial("_top_14",
		array('dataProvider'=>$top_14_dataProvider)); 
?-->