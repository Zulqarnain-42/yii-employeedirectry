<?php
/* @var $this EmployeeController */
/* @var $data Employee */
?>

<div class="bg-white shadow rounded-lg p-6 mb-4 border border-gray-200">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">
        <?php echo CHtml::encode($data->FirstName . ' ' . $data->LastName); ?>
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
        <div>
            <span class="font-medium">First Name:</span>
            <div><?php echo CHtml::encode($data->FirstName); ?></div>
        </div>

        <div>
            <span class="font-medium">Last Name:</span>
            <div><?php echo CHtml::encode($data->LastName); ?></div>
        </div>

        <div>
            <span class="font-medium">Email:</span>
            <div><?php echo CHtml::encode($data->Email); ?></div>
        </div>

        <div>
            <span class="font-medium">Phone Number:</span>
            <div><?php echo CHtml::encode($data->PhoneNumber); ?></div>
        </div>

        <div>
            <span class="font-medium">Hire Date:</span>
            <div><?php echo CHtml::encode($data->HireDate); ?></div>
        </div>

        <div>
            <span class="font-medium">Job Title:</span>
            <div><?php echo CHtml::encode($data->JobTitle); ?></div>
        </div>
    </div>
</div>
