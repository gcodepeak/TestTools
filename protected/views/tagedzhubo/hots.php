<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/hots.css" />

<div class="list_content">
	<div class="list_con">
		<!--标题-->
		<div class="list_con_titlebar clearfix">
			<div class="category_tag_div new_peo_tag hots">
				<!-- span class="c_tag1"><a href="#">小清新</a></span>
				<span class="c_tag2"><a href="#">活泼</a></span>
				<span class="c_tag3"><a href="#">骨子里</a></span-->
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
							$url = Yii::app()->createUrl("/tagedzhubo/index",array('tagName'=>$tags[$i]));
							$hrefClass = "";
							if ($tagName == $tags[$i]) {
								$hrefClass = "hit";
							}
							print '<span class="c_tag'. ($i % 5 + 1). '"><a href="'. $url .'" class="'. $hrefClass .'" target="_blank">'. $tags[$i] .'</a></span>';
						}
					}
				?>

				<a href="<?php echo Yii::app()->createUrl('/zhubo/homepage');?>" style="color:#0000FF;margin-right:5px;" target="_blank">更多></a>
			</div>
		</div>

		<div class="list_con_list clearfix">
			<?php
				$this->renderPartial ( "_hots", array (
						'dataProvider' => $dataProvider 
				));
			?>
		</div>
		
		<div style="width:500px,height:60px;margin:0px 3px;">
			<!--img src="<php  echo Yii::app()->request->baseUrl.'/images/m-ad-app.jpg';?>" style="margin-left:-15px;"/-->
			<script type="text/javascript">BAIDU_CLB_fillSlot("915139");</script>
			<!--script type="text/javascript">
				var sogou_ad_id=334449;
				var sogou_ad_height=60;
				var sogou_ad_width=468;
			</script>
			<script type='text/javascript' src='http://images.sohu.com/cs/jsfile/js/c.js'></script-->
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
