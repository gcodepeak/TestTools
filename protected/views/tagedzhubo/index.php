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
			<span class="list_c_t1"><?php echo $tagName;?></span>
				<!-- span class="list_t_span type_cur"><a href="#">主播最多</a></span><b></b>
				<span class="list_t_span"><a href="#">粉丝最多</a></span><b></b>
				<span class="list_t_span"><a href="#">大富大贵</a></span><b></b>
				<span class="list_t_span"><a href="#">历史悠久</a></span-->
				<span class="category_tag_div new_peo_tag_big">
					<?php 
					if (isset($tags)){
						$count = count($tags);
						$length = 0;
						for ( $i = 0; $i < $count; $i++){
							$length += strlen($tags[$i]);
							// 最佳新人下面的标签最多只能显示7个字，每个字占3个字节
							if ($length > 3 * 30){
								break;
							}
							$url = Yii::app()->createUrl("/tagedzhubo/index",array('tagName'=>$tags[$i])) ;
							$hrefClass = "";
							if ($tagName == $tags[$i]) {
								$hrefClass = "hit";
							}
							print '<span class="c_tag'. ($i % 5 + 1). '"><a href="'. $url .'" class="'. $hrefClass .'">'. $tags[$i] .'</a></span>';
						}
					}
					?>
				</span>
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

		<?php if ($pageCount >= 2) { ?>
		<!--分页-->
		<div class="list_con_pageindex">
			<?php 
				if (!isset($page)) {
					$page = 1;
				}
				$first = $page - 3;
				if ($first <= 0){
					$first = 1;
				}
				
				for ($index = $first; $index <= $first + 10 && $index <= $pageCount; $index++){
					if ($index != $page) {
						$url = Yii::app()->createUrl('tagedzhubo/index',array('page'=>$index,'tagName'=>$tagName));
						echo '<span class="list_pagenum"><a href="'. $url . '">' . $index . '</a></span>';
					} else {
						echo '<span class="list_pagenum page_cur"><a href="#">' . $index . '</a></span>';
					}
				}
				
				$nextPage = ($page < $pageCount)? ($page+1):$page;
				$url = Yii::app()->createUrl('tagedzhubo/index',array('page'=>$nextPage,'tagName'=>$tagName));
				echo '<a href="'. $url . '"><span class="list_pagenext"></span></a>';
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
		<?php } ?>
		
		<div style="width:960px,height:90px;margin:20px auto;text-align:center">
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