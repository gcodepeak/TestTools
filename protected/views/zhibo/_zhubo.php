<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<div class="span12" style="width:100%;margin-left:0px;">
<?php $this->widget ( 'zii.widgets.CListView', array (
	'dataProvider' => $dataProvider,
	'enablePagination'=>false,
	'itemView' => '_zhubo_item',
    'summaryText'=>'',
	'htmlOptions'=>array('style'=>"margin-left:0",)
));?>
</div>