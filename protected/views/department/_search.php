<?php
/* @var $this DepartmentController */
/* @var $model Department */
/* @var $form CActiveForm */
?>

<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow space-y-6">

<?php $form = $this->beginWidget('CActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
    'htmlOptions' => ['class' => 'space-y-4'],
)); ?>

    <div class="flex flex-col">
        <?php echo $form->label($model, 'DepartmentName', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
        <?php echo $form->textField($model, 'DepartmentName', [
            'size' => 60,
            'maxlength' => 100,
            'class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500',
            'placeholder' => 'Enter department name',
        ]); ?>
    </div>

    <div class="flex flex-col">
        <?php echo $form->label($model, 'Location', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
        <?php echo $form->textField($model, 'Location', [
            'size' => 60,
            'maxlength' => 100,
            'class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500',
            'placeholder' => 'Enter location',
        ]); ?>
    </div>

    <div class="flex justify-end">
        <?php echo CHtml::submitButton('Search', [
            'class' => 'bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition font-semibold',
        ]); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
