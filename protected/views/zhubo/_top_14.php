<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<?php 
	$top14s = $dataProvider->getData();
?>
<div class="top14">
	<ul>
		<li class="head_cube doublesize" style="top: 0px; left: 0px;" data-id="0">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[0]['id'],))?>" target="_blank">
				<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube_double.png">
			</a>
		</li>
		<li class="head_cube" style="top: 0px; left: 298px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[1]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		<li class="head_cube" style="top: 0px; left: 447px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[2]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		<li class="head_cube" style="top: 0px; left: 594px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[3]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		<li class="head_cube doublesize" style="top: 0px; left: 743px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[4]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube_double.png">
			</a>
		</li>
		<li class="head_cube" style="top: 0px; left: 1041px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[5]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		
		<!-- 第二行 -->
		<li class="head_cube" style="top: 114px; left: 298px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[6]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		<li class="head_cube doublesize" style="top: 114px; left: 447px;" data-id="2">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[7]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube_double.png">
			</a>
		</li>
		<li class="head_cube" style="top: 114px; left: 1041px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[8]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		
		<!-- 第三行 -->
		<li class="head_cube" style="top: 228px; left: 0px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[9]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		<li class="head_cube" style="top: 228px; left: 149px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[9]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		<li class="head_cube" style="top: 228px; left: 298px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[1]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		<li class="head_cube" style="top: 228px; left: 743px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[9]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		<li class="head_cube" style="top: 228px; left: 892px;" data-id="1">
			<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[9]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		<li class="head_cube" style="top: 228px; left: 1041px;" data-id="1">
			<span class="huanyihuan">
			<?php echo CHtml::ajaxLink(
			    "",  
			    array('zhubo/top_14'), // Yii URL  
			    array('update' => '#top_14'),// jQuery selector
			    //array('style' => "width:100%;height:100%;background-image:url(". Yii::app()->baseUrl ."/images/index01-huan.gif)")
				array('style' => "width:100%;height:100%;display:block;")
			); ?>
			</span>
		</li>
	</ul>
</div>