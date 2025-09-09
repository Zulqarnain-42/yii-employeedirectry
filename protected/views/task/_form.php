<?php
/* @var $this TaskController */
/* @var $model Task */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'task-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
    <?php echo $form->labelEx($model,'employee_ids'); ?>

    <?php
		$employeeList = CHtml::listData(Employee::model()->findAll(), 'EmployeeID', function($employee) {
			return $employee->FirstName . ' ' . $employee->LastName;
		});

		echo $form->dropDownList(
			$model,
			'employee_ids',
			$employeeList,
			array(
				'multiple' => 'multiple',    // enable multi-select
				'size' => 6,                 // visible rows in dropdown
				'style' => 'width: 100%;',   // optional styling
			)
		);
		?>

		<?php echo $form->error($model,'employee_ids'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TaskCategoryID'); ?>
		<?php echo $form->dropDownList($model,'TaskCategoryID',$categoryList,array('prompt' => 'Select Task Category','class' => 'form-control')); ?>
		<?php echo $form->error($model,'TaskCategoryID'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->