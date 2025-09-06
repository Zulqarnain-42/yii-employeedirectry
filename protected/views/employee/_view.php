<?php
/* @var $this EmployeeController */
/* @var $data Employee */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('FirstName')); ?>:</b>
	<?php echo CHtml::encode($data->FirstName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LastName')); ?>:</b>
	<?php echo CHtml::encode($data->LastName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PhoneNumber')); ?>:</b>
	<?php echo CHtml::encode($data->PhoneNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HireDate')); ?>:</b>
	<?php echo CHtml::encode($data->HireDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JobTitle')); ?>:</b>
	<?php echo CHtml::encode($data->JobTitle); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Salary')); ?>:</b>
	<?php echo CHtml::encode($data->Salary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DepartmentID')); ?>:</b>
	<?php echo CHtml::encode($data->DepartmentID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreatedAt')); ?>:</b>
	<?php echo CHtml::encode($data->CreatedAt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UpdatedAt')); ?>:</b>
	<?php echo CHtml::encode($data->UpdatedAt); ?>
	<br />

	*/ ?>

</div>