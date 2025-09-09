<?php
/* @var $this DepartmentController */
/* @var $model Department */
/* @var $form CActiveForm */
?>

<div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'department-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => ['class' => 'space-y-6'],
    )); ?>

    <p class="text-gray-600 text-sm mb-4">Fields with <span class="text-red-600">*</span> are required.</p>

    <?php echo $form->errorSummary($model, '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">', '</div>'); ?>

    <div class="flex flex-col">
        <?php echo $form->labelEx($model, 'DepartmentName', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
        <?php echo $form->textField($model, 'DepartmentName', ['class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500']); ?>
        <?php echo $form->error($model, 'DepartmentName', ['class' => 'text-red-600 mt-1 text-sm']); ?>
    </div>

    <div class="flex flex-col">
        <?php echo $form->labelEx($model, 'Location', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
        <?php echo $form->textField($model, 'Location', ['class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500']); ?>
        <?php echo $form->error($model, 'Location', ['class' => 'text-red-600 mt-1 text-sm']); ?>
    </div>

    <div class="flex justify-end">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', [
            'class' => 'bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition font-semibold',
        ]); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
