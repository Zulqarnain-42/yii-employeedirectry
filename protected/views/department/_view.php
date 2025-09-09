<?php
/* @var $this DepartmentController */
/* @var $data Department */
?>

<div class="bg-white shadow-md rounded-lg p-6 mb-6 max-w-md mx-auto">
    <div class="mb-4">
        <span class="font-semibold text-gray-700"><?php echo CHtml::encode($data->getAttributeLabel('DepartmentName')); ?>:</span>
        <span class="text-gray-900 ml-2"><?php echo CHtml::encode($data->DepartmentName); ?></span>
    </div>

    <div class="mb-4">
        <span class="font-semibold text-gray-700"><?php echo CHtml::encode($data->getAttributeLabel('Location')); ?>:</span>
        <span class="text-gray-900 ml-2"><?php echo CHtml::encode($data->Location); ?></span>
    </div>

    <div class="mb-4">
        <span class="font-semibold text-gray-700"><?php echo CHtml::encode($data->getAttributeLabel('CreatedAt')); ?>:</span>
        <span class="text-gray-900 ml-2"><?php echo CHtml::encode($data->CreatedAt); ?></span>
    </div>

    <div>
        <span class="font-semibold text-gray-700"><?php echo CHtml::encode($data->getAttributeLabel('UpdatedAt')); ?>:</span>
        <span class="text-gray-900 ml-2"><?php echo CHtml::encode($data->UpdatedAt); ?></span>
    </div>
</div>
