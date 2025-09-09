<?php
/* @var $this EmployeeController */
/* @var $model Employee */

$this->breadcrumbs=array(
	'Employees'=>array('index'),
	$model->EmployeeID=>array('view','id'=>$model->EmployeeID),
	'Update',
);

?>


<?php $this->renderPartial('_form', array('model'=>$model,'departmentList'=>$departmentList)); ?>