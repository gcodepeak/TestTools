<?php
/* @var $this ZhuboController */
/* @var $dataProvider CActiveDataProvider */

?>
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/homepage.css" />

<!-- top 14 -->
<div class="head_top_N" id="top_14">
	<?php	
		$this->renderPartial("_top_14",
			array('dataProvider'=>$top_14_dataProvider)); 
	?>
</div>

<div class="container">
      <div class="row">
        <div class="col-md-10">
        	<!-- 精挑细选部分 -->
        	<div class="row" style="margin-top: 20px; margin-bottom: 20px;">
				<div class="col-md-2  pull-left">
					<span style="font-size: 26px;">精挑细选</span>
				</div>
				<div class="col-md-2">
					<?php echo CHtml::ajaxLink(  
					     '<span class="zhubo_tag">All</span>',  
					     array('zhubo/jingtiaoxixuan', 'tag' =>''), // Yii URL  
					     array('update' => '#jingtiaoxixuan')// jQuery selector
					); ?>
				</div>
				<div class="col-md-2">
					<?php echo CHtml::ajaxLink(  
					     '<span class="zhubo_tag">好声音</span>',  
					     array('zhubo/jingtiaoxixuan', 'tag' =>'haoshenyin'), // Yii URL  
					     array('update' => '#jingtiaoxixuan')// jQuery selector
					); ?>
				</div>
				<div class="col-md-2">
					<?php echo CHtml::ajaxLink(  
					     '<span class="zhubo_tag">小清新</span>',  
					     array('zhubo/jingtiaoxixuan', 'tag' =>'xiaoqingxin'), // Yii URL  
					     array('update' => '#jingtiaoxixuan')// jQuery selector
					); ?>
				</div>
				<div class="col-md-2">
					<?php echo CHtml::ajaxLink(  
					     '<span class="zhubo_tag">活泼范</span>',  
					     array('zhubo/jingtiaoxixuan', 'tag' =>'huopofan'), // Yii URL  
					     array('update' => '#jingtiaoxixuan')// jQuery selector
					); ?>
				</div>
				<div class="col-md-2">
					<?php echo CHtml::ajaxLink(  
					     '<span class="zhubo_tag">气质型</span>',  
					     array('zhubo/jingtiaoxixuan', 'tag' =>'qizhixing'), // Yii URL  
					     array('update' => '#jingtiaoxixuan')// jQuery selector
					); ?>
				</div>
			</div>
			<div class="row" id='jingtiaoxixuan'>
	        	<?php	
					$this->renderPartial("_jingtiaoxixuan",
						array('dataProvider'=>$jingtiaoxixuan_dataProvider)); 
				?>
        	</div>
        	
        	
        	<!-- 最佳新人部分 -->
        	<div class="row">
        		<HR color=#99CC33 SIZE=5>
        		<HR align=center width=300 color="red" SIZE=1>
        	</div>    	      
		    
		    <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
        		<div class="col-md-6  pull-left">
        			<span class="green" style="font-size: 26px;">最佳新人</span>
        			<span class="gray" style="font-size: 26px;">BEST NEWCOMMER</span>
        		</div>
        		<div class="col-md-4 col-md-offset-2" style="font-size: 16px">
        			<span class="pull-right">
        			<?php echo CHtml::ajaxLink(  
					     '<span >一周内 &nbsp</span>',  
					     array('zhubo/zuijiaxinren', 'time' =>'7'), // Yii URL  
					     array('update' => '#zuijiaxinren')// jQuery selector
					); ?> |
					<?php echo CHtml::ajaxLink(  
					     '<span >&nbsp 两周内 &nbsp</span>',  
					     array('zhubo/zuijiaxinren', 'time' =>'14'), // Yii URL  
					     array('update' => '#zuijiaxinren')// jQuery selector
					); ?> |
					<?php echo CHtml::ajaxLink(  
					     '<span ">&nbsp 一月内</span>',  
					     array('zhubo/zuijiaxinren', 'time' =>'30'), // Yii URL  
					     array('update' => '#zuijiaxinren')// jQuery selector
					); ?>
					</span>
        		</div>
        	</div> 
		    <div class="row" id="zuijiaxinren">
		    	<?php	
					$this->renderPartial("_zuijiaxinren",
						array('dataProvider'=>$zuijiaxinren_dataProvider)); 
				?>
		    </div>
		    
		    <!-- 主播家族部分 -->    	      
		    <hr color=#99CC33 size=3>
		    <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
		    	<div class="col-md-6 pull-left">
		    		<span style="color:#FE089F;font-size: 26px">主播家族</span>
		    		<span class="gray" style="font-size:26px">ANCHOR FAMILY</span>
		    		</div>
				<div class="col-md-5 col-md-offset-1 pull-right">
					<a href="" target="_blank" hidefocus="true" class="label label-zhubozuiduo">&nbsp主播最多&nbsp</a>
					<a href="" target="_blank" hidefocus="true" class="label label-fensizuiduo">&nbsp粉丝最多&nbsp</a>
					<a href="" target="_blank" hidefocus="true" class="label label-dafudagui">&nbsp大富大贵&nbsp</a>
					<a href="" target="_blank" hidefocus="true" class="label label-lishiyoujiu">&nbsp历史悠久&nbsp</a>
				</div>
		    </div>
        </div><!--/span-->
        
        <div class="col-md-2" id="right_top5" style="margin-top:20px">
        	<div class="row green"><span class="fs22">MTop 5</span></div>
		    <div class="row gray"><span class="fs22">本周人气主播排行</span></div>
		    <div class="row" id="top_hots_5">
        		<?php $this->widget ( 'zii.widgets.CListView', array (
						'dataProvider' => $top5_dataProvider,
						'enablePagination'=>false,
						'itemView' => '_top_5',
        				'summaryText'=>'',
				));?>
        	</div><!--/row-->
		        	
			<div class="row green"><span class="fs22">$Top 5</span></div>
		    <div class="row gray"><span class="fs22">本周财富主播排行</span></div>
		    <div class="row" id="top_wealth_5">
        		<?php $this->widget ( 'zii.widgets.CListView', array (
						'dataProvider' => $top5_dataProvider,
						'enablePagination'=>false,
						'itemView' => '_top_5',
        				'summaryText'=>'',
				));?>
        	</div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->     
</div>