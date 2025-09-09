<?php
/* @var $this DepartmentController */
/* @var $model Department */

$this->breadcrumbs=array(
	'Departments'=>array('index'),
	'Create',
);
?>

<h1>Create Department</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>