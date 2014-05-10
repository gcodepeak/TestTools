<?php
/* @var $this FamilyController */

?>

<?php
/* @var $this ShowSiteController */
?>

<div class="container">
	<div class="row" style="">
		<div class="col-md-4  pull-left">
			<span style="font-size: 26px;color:#FE089F"><?php echo $familyName?>&nbsp&nbsp</span>
		</div>
		<div class="col-md-2 pull-right">
			<a href="#">
				<img alt="" src="#">
			</a>
		</div>
    </div>
    
    <hr style="margin-top: 10px;margin-bottom: 10px; height:2px;border:1px solid #eee; background-color:#eee"></hr>
    
	<div class="row">
		<div class="col-md-9">
		    <div class="row">
		    	<div class="col-md-2">
		    		<a href="#">
						<img alt="" src="<?php echo Yii::app()->baseUrl;?>/images/head_cube.png">
					</a>
		    	</div>
		    	<div class="col-md-4">
		    		
		    	</div>
		    	<div class="col-md-6">
		    		
		    	</div>
		    </div>
		    
		    <div class="row" id="_zhubo_of_family">
				<?php	
					$this->renderPartial("_zhubo",
						array('dataProvider'=>$dataProvider));
				?>
		    </div>
		</div>
		
		<div class="col-md-3">
			<div class="row">
				<span>族长</span>
			</div>
			
			<div class="row">
				<span>副族长</span>
			</div>
		</div>
	</div>
</div>