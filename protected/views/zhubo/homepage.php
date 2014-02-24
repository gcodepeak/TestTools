<?php
/* @var $this ZhuboController */
/* @var $dataProvider CActiveDataProvider */

?>
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/homepage.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/zhubo.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/tooltips.css" />


<!-- top 14 -->
<div style="width: 100%;background-color:#ead0db;">
	<div class="row-fluid" style="margin:0 auto;">
    	<hr style="height:0px;border:1px solid #d6d8d8;background-color:#d6d8d8"></hr>
    </div>
	<div id="top_14" style="margin:2px auto;width:1190px;height:341px;">
		<?php
			$this->renderPartial("_top_14",
				array('dataProvider'=>$top_14_dataProvider)); 
		?>
	</div>
</div>


<div style="width:1190px;margin:32px auto;">
	<div style="width:960px;float:left;">
		<!-- 精挑细选部分 -->
        	<div class="row-fluid" style="margin-bottom: 26px;">
				<div class="span2  pull-left" style="margin-top:10px;">
					<span style="font-size: 32px;color:#7f7f7f;">精挑细选</span>
				</div>
				<div class="span2">
					<?php echo CHtml::ajaxLink(  
					     '<span class="zhubo_tag">All</span>',  
					     array('zhubo/jingtiaoxixuan', 'tag' =>''), // Yii URL  
					     array('update' => '#jingtiaoxixuan')// jQuery selector
					); ?>
				</div>
				<div class="span2">
					<?php echo CHtml::ajaxLink(  
					     '<span class="zhubo_tag">好声音</span>',  
					     array('zhubo/jingtiaoxixuan', 'tag' =>'1'), // Yii URL  
					     array('update' => '#jingtiaoxixuan')// jQuery selector
					); ?>
				</div>
				<div class="span2">
					<?php echo CHtml::ajaxLink(  
					     '<span class="zhubo_tag">小清新</span>',  
					     array('zhubo/jingtiaoxixuan', 'tag' =>'2'), // Yii URL  
					     array('update' => '#jingtiaoxixuan')// jQuery selector
					); ?>
				</div>
				<div class="span2">
					<?php echo CHtml::ajaxLink(  
					     '<span class="zhubo_tag">活泼范</span>',  
					     array('zhubo/jingtiaoxixuan', 'tag' =>'3'), // Yii URL  
					     array('update' => '#jingtiaoxixuan')// jQuery selector
					); ?>
				</div>
				<div class="span2">
					<?php echo CHtml::ajaxLink(  
					     '<span class="zhubo_tag">气质型</span>',  
					     array('zhubo/jingtiaoxixuan', 'tag' =>'4'), // Yii URL  
					     array('update' => '#jingtiaoxixuan')// jQuery selector
					); ?>
				</div>
			</div>
			<div class="row-fluid" id='jingtiaoxixuan'>
	        	<?php	
					$this->renderPartial("_jingtiaoxixuan",
						array('dataProvider'=>$jingtiaoxixuan_dataProvider)); 
				?>
        	</div>
        	
        <!-- 最佳新人部分 -->
        	<div class="row-fluid" style="margin:0 auto;">
        		<hr style="height:1px;border:1px solid #99CC33; background-color:#99CC33"></hr>
        	</div>     
		    
		    <div class="row-fluid" style="margin-top: 20px; margin-bottom: 20px;">
        		<div class="span9  pull-left">
        			<span style="font-size: 24px;color:#99cc33;">最佳新人</span>
        			<span style="font-size: 22px;color:#7f7f7f;">BEST NEWCOMMER</span>
        		</div>
        		
        		<div class="span3 pull-right" style="font-size: 14px;color:#99cc33;">
        			<div style="text-align:right;">
        			<?php echo CHtml::ajaxLink(  
					     '一周内 &nbsp',  
					     array('zhubo/zuijiaxinren', 'time' =>'7'), // Yii URL  
					     array('update' => '#zuijiaxinren')// jQuery selector
					); ?> |
					<?php echo CHtml::ajaxLink(  
					     '&nbsp 两周内 &nbsp',  
					     array('zhubo/zuijiaxinren', 'time' =>'14'), // Yii URL  
					     array('update' => '#zuijiaxinren')// jQuery selector
					); ?> |
					<?php echo CHtml::ajaxLink(  
					     '&nbsp 一月内',  
					     array('zhubo/zuijiaxinren', 'time' =>'30'), // Yii URL  
					     array('update' => '#zuijiaxinren')// jQuery selector
					); ?>
					</div>
        		</div>
        	</div>
        	 
		    <div class="row-fluid" id="zuijiaxinren">
		    	<?php	
					$this->renderPartial("_zuijiaxinren",
						array('dataProvider'=>$zuijiaxinren_dataProvider)); 
				?>
		    </div>
		    
		    <div class="row-fluid" style="margin:0 auto;">
        		<hr style="height:1px;border:1px solid #FE089F; background-color:#FE019C"></hr>
        	</div>
		 <!-- 主播家族部分 --> 
		    <!--   	      
		     
        	
		    <div class="row-fluid" style="margin-top: 20px; margin-bottom: 20px;">
		    	<div class="span6 pull-left">
		    		<span style="color:#FE089F;font-size: 26px">主播家族</span>
		    		<span class="gray" style="font-size:26px">ANCHOR FAMILY</span>
		    		</div>
				<div class="span5 offset-1 pull-right">
					<a href="" target="_blank" hidefocus="true" class="label label-zhubozuiduo">&nbsp主播最多&nbsp</a>
					<a href="" target="_blank" hidefocus="true" class="label label-fensizuiduo">&nbsp粉丝最多&nbsp</a>
					<a href="" target="_blank" hidefocus="true" class="label label-dafudagui">&nbsp大富大贵&nbsp</a>
					<a href="" target="_blank" hidefocus="true" class="label label-lishiyoujiu">&nbsp历史悠久&nbsp</a>
				</div>
		    </div>
		    -->
		    <div class="row-fluid" style="width:960px,height:95px;margin:0 auto;">
		    	<script type="text/javascript">
					var sogou_ad_id=307408;
					var sogou_ad_height=90;
					var sogou_ad_width=960;
				</script>
				<script language='JavaScript' type='text/javascript' src='http://images.sohu.com/cs/jsfile/js/c.js'></script>
		    </div>
    </div>
    
    <div style="width:230px;float:right;">
		<div id="right_top5" style="margin-top:-5px;margin-left:57px;">
        	<div class="row-fluid"><span style="font-size:24px;color:#99cc33;"><strong>MTOP 5</strong></span></div>
		    <div class="row-fluid" style="margin-top:2px;margin-bottom:26px;"><span style="font-size:20px;color:#989898;">本周人气主播排行</span></div>
		    <div class="row-fluid" id="top_hots_5">
        		<?php $this->widget ( 'zii.widgets.CListView', array (
						'dataProvider' => $top5_dataProvider,
						'enablePagination'=>false,
						'itemView' => '_top_5',
        				'summaryText'=>'',
				));?>
        	</div>
		        	
			<div class="row-fluid" style="margin-top:40px;"><span style="font-size:24px;color:#99cc33;"><strong>$TOP 5</strong></span></div>
		    <div class="row-fluid" style="margin-top:2px;margin-bottom:26px;"><span style="font-size:20px;color:#989898;">本周财富主播排行</span></div>
		    <div class="row-fluid" id="top_wealth_5">
        		<?php $this->widget ( 'zii.widgets.CListView', array (
						'dataProvider' => $top5_dataProvider,
						'enablePagination'=>false,
						'itemView' => '_top_5',
        				'summaryText'=>'',
				));?>
        	</div>
        </div>
	</div>
</div>