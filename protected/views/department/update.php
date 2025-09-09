<?php
/* @var $this DepartmentController */
/* @var $model Department */

$this->breadcrumbs=array(
	'Departments'=>array('index'),
	$model->DepartmentID=>array('view','id'=>$model->DepartmentID),
	'Update',
);

?>

<h1>Update Department <?php echo $model->DepartmentID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>