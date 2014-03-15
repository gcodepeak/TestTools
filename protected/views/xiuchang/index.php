<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/list_new.css" />

<div class="list_content">
	<div class="list_con">
		<!--标题-->
		<div class="list_con_titlebar clearfix">
			<div class="list_con_titlebar_left">
			<span class="list_c_t1"><?php echo $showSiteName;?></span><span
				class="list_t_span type_cur"><a href="#">主播最多</a></span><b></b><span
				class="list_t_span"><a href="#">粉丝最多</a></span><b></b><span
				class="list_t_span"><a href="#">大富大贵</a></span><b></b><span
				class="list_t_span"><a href="#">历史悠久</a></span> 
			</div>
			<span class="list_t_ad">
				<script type="text/javascript">
				var sogou_ad_id=319160;
				var sogou_ad_height=60;
				var sogou_ad_width=234;
				</script>
				<script language='JavaScript' type='text/javascript' src='http://images.sohu.com/cs/jsfile/js/c.js'></script>
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
				if (!isset($page)) {
					$page = 1;
				}
				if ($pageCount >= 2) {
					for ($index = 1; $index <= $pageCount; $index++){
						if ($index != $page) {
							$url = Yii::app()->createUrl('xiuchang/index',array('page'=>$index,'site'=>$site));
							echo '<span class="list_pagenum"><a href="'. $url . '">' . $index . '</a></span>';
						} else {
							echo '<span class="list_pagenum page_cur"><a href="#">' . $index . '</a></span>';
						}
					}
					
					$nextPage = ($page < $pageCount)? ($page+1):$page;
					$url = Yii::app()->createUrl('xiuchang/index',array('page'=>$nextPage,'site'=>$site));
					echo '<a href="'. $url . '"><span class="list_pagenext"></span></a>';
				}
			?>
			<!-- span class="list_pagenum page_cur"><a href="#">1</a></span>
			<span class="list_pagenum"><a href="#">2</a></span>
			<span class="list_pagenum"><a href="#">3</a></span>
			<span class="list_pagenum">4</span><span class="list_pagenum">5</span>
			<span class="list_pagenum">6</span><span class="list_pagenum">7</span>
			<span class="list_pagenum">8</span><span class="list_pagenum">9</span>
			<span class="list_pagenum">10</span>
			<span class="list_pagenext"></span-->
		</div>
		
		<div style="width:960px,height:90px;margin:20px auto;">
			<script type="text/javascript">
			var sogou_ad_id=319155;
			var sogou_ad_height=90;
			var sogou_ad_width=960;
			</script>
			<script language='JavaScript' type='text/javascript' src='http://images.sohu.com/cs/jsfile/js/c.js'></script>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
	    //分页鼠标hover效果
	    $(".list_pagenum a").hover(function(){
			$(this).parent().addClass("list_pagenum_hover");
		},function(){
			$(this).parent().removeClass("list_pagenum_hover");
		});
	});
</script>