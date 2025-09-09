<?php
/* @var $this TaskController */
/* @var $model Task */
/* @var $form CActiveForm */
?>

<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow space-y-6">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="flex flex-col">
		<?php echo $form->label($model,'id', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
		<?php echo $form->textField($model,'id', ['class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-700']); ?>
	</div>

	<div class="flex flex-col">
		<?php echo $form->label($model,'title', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-700')); ?>
	</div>

	<div class="flex flex-col">
		<?php echo $form->label($model,'description', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50,'class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-700')); ?>
	</div>

	<div class="flex flex-col">
		<?php echo $form->label($model,'status', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
		<?php echo $form->textField($model,'status', ['class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-700']); ?>
	</div>

	<div class="flex flex-col mt-4">
		<?php echo CHtml::submitButton('Search', array(
			'class'=>'bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition'
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->