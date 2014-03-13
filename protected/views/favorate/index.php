<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/myfollowed_new.css" />

<div class="list_content">
	<div class="list_con">
		<!--标题-->
		<div class="list_con_titlebar">
			<span class="list_c_t1">我的关注</span> <span class="list_t_ad"> <img
				src="/images/list_ad.png" alt="">
			</span>
		</div>
<?php if (count($dataProvider) <= 0) { ?>		
		<div class="list_con_list pad_bom">
			<div class="mf_info_no clearfix">
				<div class="mf_info_left">
					<img src="/images/myfollow_gz_headimg.png" alt="">
				</div>
				<div class="mf_info_right">
					<div class="mf_info_right_t">亲，你还没关注主播</div>
					<div class="mf_info_right_b">
						怎么关注？看到喜欢的主播点亮<b class="mf_gz_icon"></b>即可关注
					</div>
				</div>
			</div>
		</div>
<?php } else if (count($dataProvider) >= 8) { ?>
		<!--图内容-->
		<div class="list_con_list clearfix">
			<!--广告上部分内容-->
			
			<?php
				//$index = 0;
				//for($index = 0; $index < 4; $index++) {
					$this->renderPartial("_favo_item",
						array('dataProvider'=>$dataProvider));
				//} 
			?>
			
			<!--广告-->
			<div class="top_con_top_ad">
				<img src="/images/toplist_ad.png" alt="">
			</div>

			<!--广告下部分内容-->
			<?php
				//$index = 0;
				//for($index = 0; $index < 4; $index++) {
					$this->renderPartial("_favo_item",
						array('dataProvider'=>$dataProvider));
				//} 
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
							$url = Yii::app()->createUrl('xiuchang/index',array('page'=>$index));
							echo '<span class="list_pagenum"><a href="'. $url . '">' . $index . '</a></span>';
						} else {
							echo '<span class="list_pagenum page_cur"><a href="#">' . $index . '</a></span>';
						}
					}
					
					$nextPage = ($page < $pageCount)? ($page+1):$page;
					$url = Yii::app()->createUrl('favorate/index',array('page'=>$nextPage));
					echo '<a href="'. $url . '"><span class="list_pagenext"></span></a>';
				}
			?>
			<!-- span class="list_pagenum page_cur"><a href="#">1</a></span><span
				class="list_pagenum"><a href="#">2</a></span><span
				class="list_pagenum"><a href="#">3</a></span><span
				class="list_pagenum">4</span><span class="list_pagenum">5</span><span
				class="list_pagenum">6</span><span class="list_pagenum">7</span><span
				class="list_pagenum">8</span><span class="list_pagenum">9</span><span
				class="list_pagenum">10</span><span class="list_pagenext"></span-->
		</div>
<?php };?>
		
	</div>
	
<?php if (count($dataProvider) < 8) {?>
	<!--推荐部分-->
    <div class="mf_div">
        <div class="mf_recommend_div">
            <div class="mf_recommend_title clearfix">
                <span class="mf_recommend_img"></span>
                <span class="mf_recommend_change">换一组</span>
            </div>
            <div class="mf_recom_con clearfix">
            <?php
            	$this->renderPartial("../zhubo/_zuijiaxinren",
					array('dataProvider'=>$dataProvider));
			?>
			</div>
		</div>
	</div>	
<?php }?>

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