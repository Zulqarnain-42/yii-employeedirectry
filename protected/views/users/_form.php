<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form max-w-3xl mx-auto bg-white p-6 rounded shadow">

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'users-form',
    'enableAjaxValidation' => false,
)); ?>

    <p class="note text-sm text-gray-600 mb-4">Fields with <span class="required text-red-500">*</span> are required.</p>

    <?php echo $form->errorSummary($model, null, null, ['class' => 'text-red-600 mb-4']); ?>

    <!-- Employee Dropdown -->
    <div class="mb-4">
        <?php echo $form->labelEx($model, 'Employee_Id', ['class' => 'block text-gray-700']); ?>
        <?php echo $form->dropDownList(
            $model,
            'Employee_Id',
            $employeeList,
            [
                'prompt' => 'Select Employee',
                'class' => 'w-full border border-gray-300 rounded px-3 py-2',
                'ajax' => [
                    'type' => 'POST',
                    'url' => Yii::app()->createUrl('employee/getEmployeeData'),
                    'data' => ['EmployeeID' => 'js:this.value'],
                    'success' => 'function(data) {
                        try {
                            var emp = JSON.parse(data);
                            $("#Users_full_name").val(emp.fullName);
                            $("#Users_email").val(emp.Email);
                        } catch(e) {
                            console.error("Invalid JSON:", data);
                        }
                    }',
                ],
            ]
        ); ?>
        <?php echo $form->error($model, 'Employee_Id', ['class' => 'text-red-500 text-sm']); ?>
    </div>

    <div class="mb-4">
        <?php echo $form->labelEx($model, 'username', ['class' => 'block text-gray-700']); ?>
        <?php echo $form->textField($model, 'username', ['class' => 'w-full border border-gray-300 rounded px-3 py-2']); ?>
        <?php echo $form->error($model, 'username', ['class' => 'text-red-500 text-sm']); ?>
    </div>

    <div class="mb-4">
        <?php echo $form->labelEx($model, 'full_name', ['class' => 'block text-gray-700']); ?>
        <?php echo $form->textField($model, 'full_name', ['class' => 'w-full border border-gray-300 rounded px-3 py-2']); ?>
        <?php echo $form->error($model, 'full_name', ['class' => 'text-red-500 text-sm']); ?>
    </div>

    <div class="mb-4">
        <?php echo $form->labelEx($model, 'email', ['class' => 'block text-gray-700']); ?>
        <?php echo $form->textField($model, 'email', ['class' => 'w-full border border-gray-300 rounded px-3 py-2']); ?>
        <?php echo $form->error($model, 'email', ['class' => 'text-red-500 text-sm']); ?>
    </div>

    <div class="mb-4">
        <?php echo $form->labelEx($model, 'password', ['class' => 'block text-gray-700']); ?>
        <?php echo $form->passwordField($model, 'password', ['class' => 'w-full border border-gray-300 rounded px-3 py-2']); ?>
        <?php echo $form->error($model, 'password', ['class' => 'text-red-500 text-sm']); ?>
    </div>

    <div class="mb-4">
        <?php echo $form->labelEx($model, 'repeat_password', ['class' => 'block text-gray-700']); ?>
        <?php echo $form->passwordField($model, 'repeat_password', ['class' => 'w-full border border-gray-300 rounded px-3 py-2']); ?>
        <?php echo $form->error($model, 'repeat_password', ['class' => 'text-red-500 text-sm']); ?>
    </div>

    <div class="mt-6">
        <?php echo CHtml::submitButton(
            $model->isNewRecord ? 'Create' : 'Save',
            ['class' => 'bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition']
        ); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
