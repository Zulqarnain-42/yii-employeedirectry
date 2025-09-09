<?php
/* @var $this TaskCategoryController */
/* @var $model TaskCategory */

$this->breadcrumbs=array(
	'Task Categories'=>array('index'),
	'Create',
);

?>

<h1>Create TaskCategory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>