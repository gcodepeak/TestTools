<?php
/* @var $this ZhuboController */
/* @var $dataProvider CActiveDataProvider */

?>

<hr>
<h2> 精挑细选<span class="fcqh">LIVE</span> </h2>

<hr>
<h2> 最佳新人<span class="fcqh">LIVE</span> </h2>

<hr>
<h2> 主播家族<span class="fcqh">LIVE</span> </h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
