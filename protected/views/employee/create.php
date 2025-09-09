<?php
/* @var $this EmployeeController */
/* @var $model Employee */

$this->breadcrumbs=array(
	'Employees'=>array('index'),
	'Create',
);

?>

<?php $this->renderPartial('_form', array('model'=>$model,'departmentList'=>$departmentList)); ?>