<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow space-y-6">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="flex flex-col">
		<?php echo $form->label($model,'username', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
		<?php echo $form->textField($model,'username', [
            'size' => 60,
            'maxlength' => 100,
            'class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500',
            'placeholder' => 'Enter Username',
        ]); ?>
	</div>

	<div class="flex flex-col">
		<?php echo $form->label($model,'email', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
		<?php echo $form->textField($model,'email', [
            'size' => 60,
            'maxlength' => 100,
            'class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500',
            'placeholder' => 'Enter email',
        ]); ?>
	</div>

	<div class="flex flex-col">
		<?php echo $form->label($model,'full_name', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
		<?php echo $form->textField($model,'full_name', [
            'size' => 60,
            'maxlength' => 100,
            'class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500',
            'placeholder' => 'Enter full name',
        ]); ?>
	</div>

	<div class="flex flex-col">
		<?php echo $form->label($model,'role', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
		<?php echo $form->textField($model,'role',array('size'=>50,'maxlength'=>50, 'class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500', 'placeholder' => 'Enter role')); ?>
	</div>

	<div class="flex justify-end">
		<?php echo CHtml::submitButton('Search', [
            'class' => 'bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition font-semibold',
        ]); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->