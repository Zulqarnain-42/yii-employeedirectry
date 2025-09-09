<?php
/* @var $this EmployeeController */
/* @var $model Employee */

$this->breadcrumbs=array(
	'Employees'=>array('index'),
	$model->EmployeeID,
);

?>

<h1>View Employee #<?php echo $model->EmployeeID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'EmployeeID',
		'FirstName',
		'LastName',
		'Email',
		'PhoneNumber',
		'HireDate',
		'JobTitle',
		'Salary',
		'DepartmentID',
		'CreatedAt',
		'UpdatedAt',
	),
)); ?>
