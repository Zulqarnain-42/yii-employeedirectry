<?php
/* @var $this EmployeeController */
/* @var $model Employee */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'FirstName'); ?>
		<?php echo $form->textField($model,'FirstName',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LastName'); ?>
		<?php echo $form->textField($model,'LastName',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PhoneNumber'); ?>
		<?php echo $form->textField($model,'PhoneNumber',array('size'=>20,'maxlength'=>20)); ?>
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
		<?php echo $form->label($model,'JobTitle'); ?>
		<?php echo $form->textField($model,'JobTitle',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Salary'); ?>
		<?php echo $form->textField($model,'Salary',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DepartmentID'); ?>
		<?php echo $form->dropDownList($model,'DepartmentID',$departmentList,array('prompt' => 'Select Department','class' => 'form-control')); ?>
		<?php echo $form->error($model,'DepartmentID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->