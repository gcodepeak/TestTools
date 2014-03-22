<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<?php 
	$top14s = $dataProvider;
?>		
<div class="top14">
	<ul class="clearfix">
<?php 
// 由于top14不是按照从小到大的顺序显示(3个大图是前3)，所以添加一个映射
$index_map = array(
	'0'=>0,'1'=>3,'2'=>4,'3'=>5,'4'=>1,'5'=>6,'6'=>7,
	'7'=>2,'8'=>8,'9'=>9,'10'=>10,'11'=>11,'12'=>12,'13'=>13,
);

$index = 0;
for ($index=0; $index < count($dataProvider); $index++) {
	$rank = $index_map[$index];
?>

<?php if ($index == 0 || $index == 4 || $index == 7) { ?>
	<li class="head_cube doublesize top14_<?php echo $index+1;?> topflag" data-id="<?php echo $index;?>">
		<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[$rank]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo $top14s[$rank]['head_img']?>" style="display: block;">
				<div class="tc_gz_div gz_big">
					<div class="fc_div clearfix">
	                	<span class="fc_div_name"><?php echo $top14s[$rank]['name'];?></span>
	                    <span class="gz_bt" uid="<?php echo $index?>"></span>
	                </div>
					<div style="display:inline;">观众/<span style="color:#666;font-size:16px;"><?php echo number_format($top14s[$rank]['fans']);?></span><span class="icon icon_peo"></span></div>
				<div style="display:inline;margin-left:50px;">粉丝/<span style="color:#666;font-size:16px;"><?php echo number_format($top14s[$rank]['fans']);?></span></div>
				<p style="padding-top:10px;">选自/<span style="color:#666;font-size:16px;"><?php echo $top14s[$rank]['showSiteName'];?></span></p>
			</div>
		</a>
	</li>
<?php } else { ?>
	<li class="head_cube top14_<?php echo $index+1;?> topflag" data-id="<?php echo $index;?>">
		<a href="<?php echo Yii::app()->createUrl('zhibo/zhibo',array('id'=>$top14s[$rank]['id'],))?>" target="_blank">
			<img alt="" src="<?php echo $top14s[$rank]['head_img']?>">
			<div class="tc_gz_div gz_sim">
				<div class="fc_div clearfix">
                	<span class="fc_div_name"><?php echo $top14s[$rank]['name'];?></span>
                    <span class="gz_bt" uid="<?php echo $index?>"></span>
                </div>
                <p>观众/<span style="color:#666;font-size:12px;"><?php echo number_format($top14s[$rank]['fans']);?></span><span class="icon icon_peo"></span></p>
                <p>粉丝/<span style="color:#666;font-size:12px;"><?php echo number_format($top14s[$rank]['fans']);?></span></p>
                <p>选自/<span style="color:#666;font-size:12px;"><?php echo $top14s[$rank]['showSiteName'];?></span></p>
            </div>
        </a>
	</li>
<?php }
}?>
		<li class="head_cube top14_15 topflag_bt" data-id="14">
			<span class="huanyihuan"><a style="width:100%;height:100%;display:block;" href="#" id="huanyihuan" rel="<?php echo $page;?>"></a></span>
		</li>
	</ul>
</div>


