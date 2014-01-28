<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<?php 
	$this->widget ( 'zii.widgets.CListView', array (
		'dataProvider' => $dataProvider,
		'enablePagination'=>false,
		'itemView' => '_zuijiaxinren_item',
		'id' => 'zuijiaxinren_clv',
	    'summaryText'=>'',
	));
?>

<script type="text/javascript">
	//展示模块
	$('.best_newer').each(function(){
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