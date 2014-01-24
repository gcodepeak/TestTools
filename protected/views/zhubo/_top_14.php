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
			<a href="<?php echo $top14s[0]['url'];?>">
				<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube_double.png">
			</a>
		</li>
		<li class="head_cube" style="top: 0px; left: 300px;" data-id="1">
			<a href="<?php echo $top14s[1]['url'];?>">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		<li class="head_cube" style="top: 0px; left: 450px;" data-id="1">
			<a href="<?php echo $top14s[2]['url'];?>">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		<li class="head_cube" style="top: 0px; left: 600px;" data-id="1">
			<a href="<?php echo $top14s[3]['url'];?>">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		<li class="head_cube doublesize" style="top: 0px; left: 750px;" data-id="1">
			<a href="<?php echo $top14s[4]['url'];?>">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube_double.png">
			</a>
		</li>
		<li class="head_cube" style="top: 0px; left: 1050px;" data-id="1">
			<a href="<?php echo $top14s[5]['url'];?>">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		
		<!-- 第二行 -->
		<li class="head_cube" style="top: 115px; left: 300px;" data-id="1">
			<a href="<?php echo $top14s[6]['url'];?>">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		<li class="head_cube doublesize" style="top: 115px; left: 450px;" data-id="2">
			<a href="<?php echo $top14s[7]['url'];?>">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube_double.png">
			</a>
		</li>
		<li class="head_cube" style="top: 115px; left: 1050px;" data-id="1">
			<a href="<?php echo $top14s[8]['url'];?>">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		
		<!-- 第三行 -->
		<li class="head_cube" style="top: 230px; left: 0px;" data-id="1">
			<a href="<?php echo $top14s[9]['url'];?>">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		<li class="head_cube" style="top: 230px; left: 150px;" data-id="1">
			<a href="<?php echo $top14s[9]['url'];?>">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		<li class="head_cube" style="top: 230px; left: 300px;" data-id="1">
			<a href="<?php echo $top14s[9]['url'];?>">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		<li class="head_cube" style="top: 230px; left: 750px;" data-id="1">
			<a href="<?php echo $top14s[9]['url'];?>">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		<li class="head_cube" style="top: 230px; left: 900px;" data-id="1">
			<a href="<?php echo $top14s[9]['url'];?>">
			<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
			</a>
		</li>
		<li class="head_cube" style="top: 231px; left: 1050px;" data-id="1">
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