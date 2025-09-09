<?php
/* @var $this TaskCategoryController */
/* @var $data TaskCategory */
?>

<div class="bg-white border border-gray-200 rounded-lg shadow p-4 mb-4">
    <div class="mb-2">
        <span class="font-semibold text-gray-700">
            <?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:
        </span>
        <span class="text-gray-900">
            <?php echo CHtml::encode($data->name); ?>
        </span>
    </div>

    <div>
        <span class="font-semibold text-gray-700">
            <?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:
        </span>
        <span class="text-gray-900">
            <?php echo CHtml::encode($data->description); ?>
        </span>
    </div>
</div>
