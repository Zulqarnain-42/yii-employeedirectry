<div class="bg-white p-6 rounded shadow max-w-4xl mx-auto">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
    )); ?>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <?php echo $form->label($model,'FirstName', ['class' => 'block text-gray-700 font-medium']); ?>
            <?php echo $form->textField($model,'FirstName',array(
                'class' => 'mt-1 block w-full border border-gray-300 rounded px-4 py-2',
                'maxlength'=>50,
                'placeholder'=>'Enter First Name'
            )); ?>
        </div>

        <div>
            <?php echo $form->label($model,'LastName', ['class' => 'block text-gray-700 font-medium']); ?>
            <?php echo $form->textField($model,'LastName',array(
                'class' => 'mt-1 block w-full border border-gray-300 rounded px-4 py-2',
                'maxlength'=>50,
                'placeholder'=>'Enter Last Name'
            )); ?>
        </div>

        <div>
            <?php echo $form->label($model,'Email', ['class' => 'block text-gray-700 font-medium']); ?>
            <?php echo $form->textField($model,'Email',array(
                'class' => 'mt-1 block w-full border border-gray-300 rounded px-4 py-2',
                'maxlength'=>100,
                'placeholder'=>'Enter Email Address'
            )); ?>
        </div>

        <div>
            <?php echo $form->label($model,'PhoneNumber', ['class' => 'block text-gray-700 font-medium']); ?>
            <?php echo $form->textField($model,'PhoneNumber',array(
                'class' => 'mt-1 block w-full border border-gray-300 rounded px-4 py-2',
                'maxlength'=>20,
                'placeholder'=>'Enter Phone Number'
            )); ?>
        </div>

        <div>
            <?php echo $form->labelEx($model, 'HireDate', ['class' => 'block text-gray-700 font-medium']); ?>

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
            <?php echo $form->error($model, 'HireDate', ['class' => 'text-red-500 text-sm mt-1']); ?>
        </div>

        <div>
            <?php echo $form->label($model,'JobTitle', ['class' => 'block text-gray-700 font-medium']); ?>
            <?php echo $form->textField($model,'JobTitle',array(
                'class' => 'mt-1 block w-full border border-gray-300 rounded px-4 py-2',
                'maxlength'=>100,
                'placeholder'=>'Enter Job Title'
            )); ?>
        </div>

        <div>
            <?php echo $form->label($model,'Salary', ['class' => 'block text-gray-700 font-medium']); ?>
            <?php echo $form->textField($model,'Salary',array(
                'class' => 'mt-1 block w-full border border-gray-300 rounded px-4 py-2',
                'maxlength'=>10,
                'placeholder'=>'Enter Salary'
            )); ?>
        </div>

        <div>
            <?php echo $form->labelEx($model,'DepartmentID', ['class' => 'block text-gray-700 font-medium']); ?>
            <?php echo $form->dropDownList($model,'DepartmentID',$departmentList,array(
                'prompt' => 'Select Department',
                'class' => 'mt-1 block w-full border border-gray-300 rounded px-4 py-2 bg-white'
            )); ?>
            <?php echo $form->error($model,'DepartmentID', ['class'=>'text-red-500 text-sm']); ?>
        </div>
    </div>

    <div class="mt-6 text-right">
        <?php echo CHtml::submitButton('Search', array(
            'class' => 'bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded transition'
        )); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
