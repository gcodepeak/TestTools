<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<div class="top_con_top_list">
	<?php $this->renderPartial("../zhubo/_top_5",
		array('dataProvider'=>$dataProvider));
	?>
</div>
