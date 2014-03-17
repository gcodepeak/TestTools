<?php
/* @var $this ZhuboController */
/* @var $dataProvider CActiveDataProvider */

?>

<link rel="stylesheet" type="text/css" href="/css/zhubo.css" />

<!-- top 14 -->
<div style="width: 100%;background-color:#ead0db;">
	<div class="row-fluid" style="margin:0 auto;">
    	<hr style="height:0px;border:1px solid #d6d8d8;background-color:#d6d8d8"></hr>
    </div> 
	<div id="top_14">
	<?php
		$this->renderPartial("_top_14",
			array('dataProvider'=>$top_14_dataProvider,'page'=>1,)); 
	?>
	</div>
</div>


<div class="paghear clearfix">
	<div class="bar_left_par">
		<!-- 精挑细选部分 -->
        	<div class="row-fluid clearfix" style="margin-bottom: 26px;">
				<div class="span2  pull-left" style="margin-top:10px;">
					<span style="font-size: 32px;color:#7f7f7f;">精挑细选</span>
				</div>
				<div class="span2 fluid_tag">
					<a href="#" id="yt1"><span class="zhubo_tag" rel="list1">All</span></a></div>
				<div class="span2 fluid_tag">
					<a href="#" id="yt2"><span class="zhubo_tag" rel="list2">可爱</span></a></div>
				<div class="span2 fluid_tag">
					<a href="#" id="yt3"><span class="zhubo_tag" rel="list3">妩媚</span></a></div>
				<div class="span2 fluid_tag">
					<a href="#" id="yt4"><span class="zhubo_tag" rel="list4">女神</span></a></div>
                <div class="span2 fluid_tag">
                    <a href="#" id="yt5"><span class="zhubo_tag" rel="list5">好声音</span></a></div>
                <b class="sanjiao"></b>
			</div>
			<div class="row-fluid clearfix" id='jingtiaoxixuan'>
	        	<?php	
					$this->renderPartial("_jingtiaoxixuan",
						array('dataProvider'=>$jingtiaoxixuan_dataProvider)); 
				?>
        	</div>
        	
        <!-- 最佳新人部分 -->
        <div class="peo_new_par clearfix">
        	<div class="split_line"></div>
		    <div class="new_bar clearfix">
        		<div class="new_bar_left">
        			<span class="new_bar_left_title1">最佳新人</span>
        			<span class="new_bar_left_title2">BEST NEWCOMMER</span>
        		</div>
        		<div class="new_bar_right">
        			<div style="text-align:right;">
                        <a href="#" id="yt6" class="cont_cur">一周内</a> | <a href="#" id="yt7">两周内</a> | <a href="#" id="yt8">一月内</a>
                    </div>
        		</div>
        	</div>
        	 
		    <div class="row-fluid clearfix" id="zuijiaxinren">
		    	<?php	
					$this->renderPartial("_zuijiaxinren",
						array('dataProvider'=>$zuijiaxinren_dataProvider)); 
				?>
		    </div>
		</div>
		    
		    <!-- div class="row-fluid" style="margin:0 auto;">
        		<hr style="height:1px;border:1px solid #FE089F; background-color:#FE019C"></hr>
        	</div-->
		
		<!-- 主播家族 -->
        <!-- div class="zb_family">
             <div class="split_line_1"></div>
             <div class="new_bar clearfix">
                 <div class="new_bar_left">
                     <span class="new_bar_left_title1 family_bar1">主播家族</span>
                     <span class="new_bar_left_title2 family_bar2">BEST NEWCOMMER</span>
                 </div>
                 <div class="new_bar_right">
                     <div style="text-align:right;">
                         <a href="#" id="yt6" class="cont_cur">主播最多</a> | <a href="#" id="yt7">粉丝最多</a> | <a href="#" id="yt8">大富大贵</a> | <a href="#" id="yt8">历史悠久</a>
                     </div>
                 </div>
             </div>
             
             <div class="hot-tag">
                 <ul class="clearfix">
                     <li><a href="www.baidu.com" target="_blank">2014放假安排(99)</a><span></span></li>
                     <li><a href="www.baidu.com" target="_blank">速度发送地方安排(99)</a><span></span></li>
                     <li><a href="www.baidu.com" target="_blank">2014放发送发送假安排(99)</a><span></span></li>
                     <li><a href="www.baidu.com" target="_blank">谁的粉丝安排(99)</a><span></span></li>
                     <li><a href="www.baidu.com" target="_blank">粉丝粉丝粉丝粉丝粉丝粉丝(99)</a><span></span></li>
                     <li><a href="www.baidu.com" target="_blank">粉丝粉丝粉丝粉丝粉丝粉丝粉丝(99)</a><span></span></li>
                     <li><a href="www.baidu.com" target="_blank">安排(99)</a><span></span></li>
                     <li><a href="www.baidu.com" target="_blank">2qwasdas假安排(99)</a><span></span></li>
                     <li><a href="www.baidu.com" target="_blank">2014速度发送地方速度发送地方(99)</a><span></span></li>
                 </ul>
             </div>
        </div-->
        
        <!-- 广告 -->
       	<div class="row-fluid" style="width:960px,height:90px;margin:20px auto;">
	    	<script type="text/javascript">
				var sogou_ad_id=307408;
				var sogou_ad_height=90;
				var sogou_ad_width=960;
			</script>
			<script language='JavaScript' type='text/javascript' src='http://images.sohu.com/cs/jsfile/js/c.js'></script>
	    </div>
	    
        <!-- 主播来源 -->
	    <div class="zhubo_from_div">
	        <div class="clearfix">
	            <div class="zb_bar"><div class="zb_leftbar_line"></div></div>
	            <div class="zb_bar zb_centent_bar">主播来源<span>FROM</span></div>
	            <div class="zb_bar"><div class="zb_right_bar_line"></div></div>
	        </div>
	        <div class="zb_form_img_div">
	            <ul class="clearfix">
	                <li><a class="zb_form_link" href="#"><div class="zb_image_wx"></div></a></li>
	                <li><a class="zb_form_link" href="#"><div class="zb_image_6u"></div></a></li>
	                <li><a class="zb_form_link" href="#"><div class="zb_image_xx"></div></a></li>
	                <li class="form_end"><a class="zb_form_link" href="#"><div class="zb_image_9158"></div></a></li>
	                <li class="form_top"><a class="zb_form_link" href="#"><div class="zb_image_kg"></div></a></li>
	                <li class="form_top"><a class="zb_form_link" href="#"><div class="zb_image_sh"></div></a></li>
	                <li class="form_top"><a class="zb_form_link" href="#"><div class="zb_image_5b"></div></a></li>
	                <li class="form_top form_end"><a class="zb_form_link" href="#"><div class="zb_image_tz"></div></a></li>
	            </ul>
	        </div>
	    </div>
    </div>
    
    <!-- 右侧 -->
    <div class="cont_right">
        <div class="mtop5">
            <div class="mtop5_title">
                <span>MTOP 5</span><span class="mtop5_rank">本周人气主播排行</span>
            </div>
            
		    <div class="mtop5_list" id="top_hots_5">
				<?php	
					$this->renderPartial("_top_5",
						array('dataProvider'=>$week_top5_dataProvider)); 
				?>
        	</div>
        </div>
		        	
		<div class="mtop5">
            <div class="mtop5_title">
                <span>MTOP 5</span><span class="mtop5_rank">本周人气主播排行</span>
            </div>
		    <div class="mtop5_list" id="top_wealth_5">
        		<?php	
					$this->renderPartial("_top_5",
						array('dataProvider'=>$month_top5_dataProvider)); 
				?>
        	</div>
        </div>
        
        <div class="mtop5">
        	<script type="text/javascript">
			var sogou_ad_id=319152;
			var sogou_ad_height=600;
			var sogou_ad_width=160;
			</script>
			<script language='JavaScript' type='text/javascript' src='http://images.sohu.com/cs/jsfile/js/c.js'></script>
        </div>
	</div>
	<div class="goto_top"></div>
</div>
