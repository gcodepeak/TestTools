<?php
/* @var $this ShowSiteController */
?>

<div class="container">
    <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
	
		<div class="col-md-2  pull-left">
			<span style="font-size: 26px;color:#FE089F"><?php echo $siteName?>&nbsp&nbsp</span>
		</div>
		<div class="col-md-1">
			<?php echo CHtml::ajaxLink(  
			     '&nbsp主播最多&nbsp',  
			     array('showsite/zhubo', 'tag' =>'zhubozuiduo'), // Yii URL  
			     array('update' => '#_zhubo_of_site'),// jQuery selector
			     array('class'=>"label label-zhubozuiduo")
			); ?>
		</div>
		<div class="col-md-1">
			<?php echo CHtml::ajaxLink(  
			     '&nbsp粉丝最多&nbsp',  
			     array('showsite/zhubo', 'tag' =>'fensizuiduo'), // Yii URL  
			     array('update' => '#_zhubo_of_site'),// jQuery selector
			     array('class'=>"label label-fensizuiduo")
			); ?>
		</div>
		<div class="col-md-1">
			<?php echo CHtml::ajaxLink(  
			     '&nbsp大富大贵&nbsp',  
			     array('showsite/zhubo', 'tag' =>'dafudagui'), // Yii URL  
			     array('update' => '#_zhubo_of_site'),// jQuery selector
			     array('class'=>"label label-dafudagui")
			); ?>
		</div>
		<div class="col-md-1">
			<?php echo CHtml::ajaxLink(  
			     '&nbsp历史悠久&nbsp',  
			     array('showsite/zhubo', 'tag' =>'lishiyoujiu'), // Yii URL  
			     array('update' => '#_zhubo_of_site'),// jQuery selector
			     array('class'=>"label label-lishiyoujiu")
			); ?>
		</div>
    </div>
    
    <div class="row" id="_zhubo_of_site">
		<?php	
			$this->renderPartial("_zhubo",
				array('dataProvider'=>$dataProvider));
		?>
    </div>
</div>
