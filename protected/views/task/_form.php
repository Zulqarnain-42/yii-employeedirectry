<?php
/* @var $this TaskController */
/* @var $model Task */
/* @var $form CActiveForm */
?>

<div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-md">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'task-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="text-gray-600 text-sm mb-4">Fields with <span class="text-red-600">*</span> are required.</p>

    <?php echo $form->errorSummary($model, '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">', '</div>'); ?>

	<div class="flex flex-col">
    <?php echo $form->labelEx($model, 'employee_ids', ['class' => 'mb-1 font-semibold text-gray-700']); ?>

    <?php
    $employeeList = CHtml::listData(Employee::model()->findAll(), 'EmployeeID', function($employee) {
        return $employee->FirstName . ' ' . $employee->LastName;
    });

    echo $form->dropDownList(
        $model,
        'employee_ids',
        $employeeList,
        array(
            'multiple' => 'multiple',
            'size' => 6,
            'class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-700',
        )
    );
    ?>

    <?php echo $form->error($model, 'employee_ids', ['class' => 'text-red-600 mt-1 text-sm']); ?>
</div>


	<div class="flex flex-col">
		<?php echo $form->labelEx($model,'TaskCategoryID', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
		<?php echo $form->dropDownList($model,'TaskCategoryID',$categoryList,array('prompt' => 'Select Task Category','class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-700')); ?>
		<?php echo $form->error($model,'TaskCategoryID', ['class' => 'text-red-600 mt-1 text-sm']); ?>
	</div>


	<div class="flex flex-col">
		<?php echo $form->labelEx($model,'title', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-700')); ?>
		<?php echo $form->error($model,'title', ['class' => 'text-red-600 mt-1 text-sm']); ?>
	</div>

	<div class="flex flex-col">
		<?php echo $form->labelEx($model,'description', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50,'class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-700')); ?>
		<?php echo $form->error($model,'description', ['class' => 'text-red-600 mt-1 text-sm']); ?>
	</div>

	<div class="mt-6">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
            'class'=>'bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition'
        )); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->