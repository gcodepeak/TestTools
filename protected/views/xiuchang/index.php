<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/list_new.css" />

<div class="list_content">
	<div class="list_con">
		<!--标题-->
		<div class="list_con_titlebar">
			<span class="list_c_t1"><?php echo $showSiteName;?></span><span
				class="list_t_span type_cur"><a href="#">主播最多</a></span><b></b><span
				class="list_t_span"><a href="#">粉丝最多</a></span><b></b><span
				class="list_t_span"><a href="#">大富大贵</a></span><b></b><span
				class="list_t_span"><a href="#">历史悠久</a></span> <span
				class="list_t_ad"> <img src="/images/list_ad.png" alt="">
			</span>
		</div>
		<!--图内容-->

		<div class="list_con_list clearfix">
			<?php
				$this->renderPartial ( "../zhubo/_zuijiaxinren", array (
						'dataProvider' => $dataProvider 
				));
			?>
		</div>

		<!--分页-->
		<div class="list_con_pageindex">
			<?php 
				if (!isset($p)) {
					$p = 1;
				}
				
				for ($index = 1; $index <= 10; $index++){
					if ($index != $p) {
						$url = Yii::app()->createUrl('xiuchang/index',array('p'=>$index,'site'=>$site));
						echo '<span class="list_pagenum"><a href="'. $url . '">' . $index . '</a></span>';
					} else {
						echo '<span class="list_pagenum page_cur"><a href="#">' . $index . '</a></span>';
					}
				}
				
			?>
			<!-- span class="list_pagenum page_cur"><a href="#">1</a></span>
			<span class="list_pagenum"><a href="#">2</a></span>
			<span class="list_pagenum"><a href="#">3</a></span>
			<span class="list_pagenum">4</span><span class="list_pagenum">5</span>
			<span class="list_pagenum">6</span><span class="list_pagenum">7</span>
			<span class="list_pagenum">8</span><span class="list_pagenum">9</span>
			<span class="list_pagenum">10</span-->
			<span class="list_pagenext"></span>
		</div>
	</div>

</div>