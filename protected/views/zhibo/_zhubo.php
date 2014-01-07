<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<div class="col-md-12">
<?php $this->widget ( 'zii.widgets.CListView', array (
	'dataProvider' => $dataProvider,
	'enablePagination'=>false,
	'itemView' => '_zhubo_item',
    'summaryText'=>'',
));?>
</div>