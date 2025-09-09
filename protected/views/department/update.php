<?php
/* @var $this DepartmentController */
/* @var $model Department */

$this->breadcrumbs=array(
	'Departments'=>array('index'),
	$model->DepartmentID=>array('view','id'=>$model->DepartmentID),
	'Update',
);

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>