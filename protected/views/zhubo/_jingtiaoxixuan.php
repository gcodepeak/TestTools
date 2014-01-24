<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<?php
	$this->widget ( 'zii.widgets.CListView', array (
		'dataProvider' => $dataProvider,
		'enablePagination' => false,
		'itemView' => '_jingtiaoxixuan_item',
		'id' => 'jingtiaoxixuan_clv',
		'summaryText' => '' 
	));
?>