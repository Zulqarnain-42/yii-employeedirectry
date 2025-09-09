<?php
/* @var $this DepartmentController */
/* @var $model Department */

$this->breadcrumbs=array(
	'Departments'=>array('index'),
	'Create',
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>