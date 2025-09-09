<?php
/* @var $this DepartmentController */
/* @var $model Department */

$this->breadcrumbs=array(
	'Departments'=>array('index'),
	$model->DepartmentID,
);

?>

<h1>View Department #<?php echo $model->DepartmentID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'DepartmentID',
		'DepartmentName',
		'Location',
		'CreatedAt',
		'UpdatedAt',
	),
)); ?>
