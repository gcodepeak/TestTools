<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<?php $this->widget ( 'zii.widgets.CListView', array (
	'dataProvider' => $dataProvider,
	'enablePagination'=>false,
	'itemView' => '_zuijiaxinren_item',
    'summaryText'=>'',
));?>