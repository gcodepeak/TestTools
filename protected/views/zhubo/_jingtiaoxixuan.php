<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<?php 
$index = 0;
foreach ($dataProvider as $data){
?>

<div class="span3" style="width:235px;margin-bottom:38px;margin-left:5px;<?php if ($index % 4 == 0) echo 'margin-left:0px;'?>">

<div class="row-fluid" cover-text="<?php echo $data['name']?>">
<div class="zhubo" style="width: 236px; height: 181px;">
		<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$data['id'],))?>" target="_blank"><img style="width: 235px; height: 180px; border:#E5E5E5 1px solid"
				src="<?php echo $data['head_img']?>" alt="<?php echo $data['name']?>" />
				<div class="info">
						<em class="bg"></em>
						<em class="showSiteName"><?php echo $data['showSiteName'];?></em>
					<em class="viewer"><i></i><?php echo $data['hots']?></em>
				</div>
				<!-- em class="play"></em-->
				<div class="overlay" style="color:#999;">
					<p style="color:#333;"><?php echo $data['name'];?></p>
				</div>
			</a>
		</div>
	</div>
	
	<div class="row-fluid" style="margin-top:12px;">
		<span class="name" style="font-size:20px;"><?php echo $data['name']?></span>
	</div>
	<div class="row-fluid"style="margin-top:10px;">
		<span style="color:#999;font-size:16px;">开播:<?php echo $data['last_live_time'];?></span>
	</div>
</div>

<?php
	$index++;
}
?>

<!-- ?php
	$this->widget ( 'zii.widgets.CListView', array (
		'dataProvider' => $dataProvider,
		'enablePagination' => false,
		'itemView' => '_jingtiaoxixuan_item',
		'id' => 'jingtiaoxixuan_clv',
		'summaryText' => '' 
	));
?-->

<script type="text/javascript">
	//展示模块
	$('.zhubo').each(function(){
		var $this = jQuery(this),$a = $this.find('a'),$overlay=$this.find('.overlay'),$info=$this.find('.info');
		if (!$this) {
			alert("error");
		}
		
		$a.hover(function(){
			//$overlay.toggle();
			$overlay.stop(true, true).slideDown(200);
			$info.toggle();
		},function(){
			//$overlay.toggle();
			$overlay.stop(true, true).slideUp(200);
			$info.toggle();
		});
	});
</script>