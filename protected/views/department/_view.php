<?php
/* @var $this DepartmentController */
/* @var $data Department */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('DepartmentName')); ?>:</b>
	<?php echo CHtml::encode($data->DepartmentName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Location')); ?>:</b>
	<?php echo CHtml::encode($data->Location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreatedAt')); ?>:</b>
	<?php echo CHtml::encode($data->CreatedAt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UpdatedAt')); ?>:</b>
	<?php echo CHtml::encode($data->UpdatedAt); ?>
	<br />


</div>