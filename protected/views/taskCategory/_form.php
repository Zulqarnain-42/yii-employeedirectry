<div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-md">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'task-category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="text-gray-600 text-sm mb-4">Fields with <span class="text-red-600">*</span> are required.</p>

	<?php echo $form->errorSummary($model, null, null, ['class' => 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4']); ?>

	<div class="flex flex-col mb-4">
		<?php echo $form->labelEx($model,'name', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
		<?php echo $form->textField($model,'name',array(
			'size'=>60,
			'maxlength'=>100,
			'class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-700'
		)); ?>
		<?php echo $form->error($model,'name', ['class' => 'text-red-600 mt-1 text-sm']); ?>
	</div>

	<div class="flex flex-col mb-4">
		<?php echo $form->labelEx($model,'description', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
		<?php echo $form->textArea($model,'description',array(
			'rows'=>6,
			'cols'=>50,
			'class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-700'
		)); ?>
		<?php echo $form->error($model,'description', ['class' => 'text-red-600 mt-1 text-sm']); ?>
	</div>

	<div class="mt-6">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
			'class'=>'bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition'
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
