<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs=array(
	'Tasks'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update Task <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'categoryList'=>$categoryList)); ?>