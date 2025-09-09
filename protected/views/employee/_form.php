<?php
/* @var $this EmployeeController */
/* @var $model Employee */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>


	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'FirstName'); ?>
		<?php echo $form->textField($model,'FirstName',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'FirstName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LastName'); ?>
		<?php echo $form->textField($model,'LastName',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'LastName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PhoneNumber'); ?>
		<?php echo $form->textField($model,'PhoneNumber',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'PhoneNumber'); ?>
	</div>

	<?php if (!$model->isNewRecord && !empty($model->ProfileImage)): ?>
		<div class="row">
			<label>Current Image:</label><br>
			<img src="data:image/jpeg;base64,<?php echo base64_encode($model->ProfileImage); ?>" width="150" />
		</div>
	<?php endif; ?>


	<div class="row">
		<?php echo $form->labelEx($model, 'ProfileImage'); ?>
		<?php echo $form->fileField($model, 'ProfileImage'); ?>
		<?php echo $form->error($model, 'ProfileImage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'HireDate'); ?>

		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'HireDate',
			'options' => array(
				'showAnim' => 'fadeIn',
				'dateFormat' => 'yy-mm-dd',
				'changeMonth' => true,
				'changeYear' => true,
				'yearRange' => '1970:2099',
			),
			'htmlOptions' => array(
				'class' => 'w-full border border-gray-300 rounded px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500',
				'placeholder' => 'Select Hire Date',
				'autocomplete' => 'off', 
			),
		));
		?>

		<?php echo $form->error($model, 'HireDate', ['class' => 'text-red-500 text-sm mt-1']); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'JobTitle'); ?>
		<?php echo $form->textField($model,'JobTitle',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'JobTitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Salary'); ?>
		<?php echo $form->textField($model,'Salary',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Salary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DepartmentID'); ?>
		<?php echo $form->dropDownList($model,'DepartmentID',$departmentList,array('prompt' => 'Select Department','class' => 'form-control')); ?>
		<?php echo $form->error($model,'DepartmentID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status', array(
			1 => 'Active',
			0 => 'Inactive'
		), array('prompt'=>'Select Status')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->