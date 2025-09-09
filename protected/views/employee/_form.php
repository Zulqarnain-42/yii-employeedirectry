<div class="max-w-3xl mx-auto bg-white p-8 rounded shadow">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'employee-form',
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    )); ?>

    <p class="text-sm text-gray-600 mb-4">
        Fields with <span class="text-red-500">*</span> are required.
    </p>

    <?php echo $form->errorSummary($model, null, null, ['class' => 'bg-red-100 text-red-700 p-4 rounded mb-4']); ?>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <?php echo $form->labelEx($model,'FirstName', ['class' => 'block font-medium text-gray-700']); ?>
            <?php echo $form->textField($model,'FirstName',array('maxlength'=>50, 'class'=>'mt-1 block w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500')); ?>
            <?php echo $form->error($model,'FirstName', ['class'=>'text-red-500 text-sm']); ?>
        </div>

        <div>
            <?php echo $form->labelEx($model,'LastName', ['class' => 'block font-medium text-gray-700']); ?>
            <?php echo $form->textField($model,'LastName',array('maxlength'=>50, 'class'=>'mt-1 block w-full border border-gray-300 rounded px-4 py-2')); ?>
            <?php echo $form->error($model,'LastName', ['class'=>'text-red-500 text-sm']); ?>
        </div>

        <div>
            <?php echo $form->labelEx($model,'Email', ['class' => 'block font-medium text-gray-700']); ?>
            <?php echo $form->textField($model,'Email',array('maxlength'=>100, 'class'=>'mt-1 block w-full border border-gray-300 rounded px-4 py-2')); ?>
            <?php echo $form->error($model,'Email', ['class'=>'text-red-500 text-sm']); ?>
        </div>

        <div>
            <?php echo $form->labelEx($model,'PhoneNumber', ['class' => 'block font-medium text-gray-700']); ?>
            <?php echo $form->textField($model,'PhoneNumber',array('maxlength'=>20, 'class'=>'mt-1 block w-full border border-gray-300 rounded px-4 py-2')); ?>
            <?php echo $form->error($model,'PhoneNumber', ['class'=>'text-red-500 text-sm']); ?>
        </div>

        <div class="col-span-1 md:col-span-2">
            <?php echo $form->labelEx($model,'ProfileImage', ['class' => 'block font-medium text-gray-700']); ?>
            <?php echo $form->fileField($model,'ProfileImage', ['class'=>'mt-1 block w-full text-sm text-gray-500']); ?>
            <?php echo $form->error($model,'ProfileImage', ['class'=>'text-red-500 text-sm']); ?>

            <?php if (!$model->isNewRecord && !empty($model->ProfileImage)): ?>
                <div class="mt-4">
                    <p class="text-sm text-gray-700 mb-1">Current Image:</p>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($model->ProfileImage); ?>" width="150" class="rounded shadow" />
                </div>
            <?php endif; ?>
        </div>

        <div>
            <?php echo $form->labelEx($model,'HireDate', ['class' => 'block font-medium text-gray-700']); ?>
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
                    'class' => 'mt-1 block w-full border border-gray-300 rounded px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500',
                    'placeholder' => 'Select Hire Date',
                    'autocomplete' => 'off',
                ),
            ));
            ?>
            <?php echo $form->error($model,'HireDate', ['class'=>'text-red-500 text-sm']); ?>
        </div>

        <div>
            <?php echo $form->labelEx($model,'JobTitle', ['class' => 'block font-medium text-gray-700']); ?>
            <?php echo $form->textField($model,'JobTitle',array('maxlength'=>100, 'class'=>'mt-1 block w-full border border-gray-300 rounded px-4 py-2')); ?>
            <?php echo $form->error($model,'JobTitle', ['class'=>'text-red-500 text-sm']); ?>
        </div>

        <div>
            <?php echo $form->labelEx($model,'Salary', ['class' => 'block font-medium text-gray-700']); ?>
            <?php echo $form->textField($model,'Salary',array('maxlength'=>10, 'class'=>'mt-1 block w-full border border-gray-300 rounded px-4 py-2')); ?>
            <?php echo $form->error($model,'Salary', ['class'=>'text-red-500 text-sm']); ?>
        </div>

        <div>
            <?php echo $form->labelEx($model,'DepartmentID', ['class' => 'block font-medium text-gray-700']); ?>
            <?php echo $form->dropDownList($model,'DepartmentID', $departmentList, array('prompt'=>'Select Department', 'class'=>'mt-1 block w-full border border-gray-300 rounded px-4 py-2 bg-white')); ?>
            <?php echo $form->error($model,'DepartmentID', ['class'=>'text-red-500 text-sm']); ?>
        </div>

        <div>
            <?php echo $form->labelEx($model,'status', ['class' => 'block font-medium text-gray-700']); ?>
            <?php echo $form->dropDownList($model,'status', array(1 => 'Active', 0 => 'Inactive'), array('prompt'=>'Select Status', 'class'=>'mt-1 block w-full border border-gray-300 rounded px-4 py-2 bg-white')); ?>
            <?php echo $form->error($model,'status', ['class'=>'text-red-500 text-sm']); ?>
        </div>
    </div>

    <div class="mt-6">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
            'class'=>'bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition'
        )); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
