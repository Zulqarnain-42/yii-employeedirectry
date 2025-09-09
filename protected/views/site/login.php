<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<div class="max-w-md mx-auto mt-12 p-8 bg-white rounded-lg shadow-md">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Login</h1>

    <p class="mb-6 text-gray-600">
        Please fill out the following form with your login credentials:
    </p>

    <?php if (Yii::app()->user->hasFlash('error')): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <?php echo Yii::app()->user->getFlash('error'); ?>
        </div>
    <?php endif; ?>

    <div class="form">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'htmlOptions' => ['class' => 'space-y-6'],
        )); ?>

        <p class="text-gray-600 text-sm">
            Fields with <span class="text-red-600">*</span> are required.
        </p>

        <div class="flex flex-col">
            <?php echo $form->labelEx($model, 'username', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
            <?php echo $form->textField($model, 'username', ['class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500']); ?>
            <?php echo $form->error($model, 'username', ['class' => 'text-red-600 mt-1 text-sm']); ?>
        </div>

        <div class="flex flex-col">
            <?php echo $form->labelEx($model, 'password', ['class' => 'mb-1 font-semibold text-gray-700']); ?>
            <?php echo $form->passwordField($model, 'password', ['class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500']); ?>
            <?php echo $form->error($model, 'password', ['class' => 'text-red-600 mt-1 text-sm']); ?>
            <p class="text-gray-500 text-sm mt-2">
                Hint: You may login with <kbd class="bg-gray-200 rounded px-1">demo</kbd>/<kbd class="bg-gray-200 rounded px-1">demo</kbd> or <kbd class="bg-gray-200 rounded px-1">admin</kbd>/<kbd class="bg-gray-200 rounded px-1">admin</kbd>.
            </p>
        </div>

        <div class="flex items-center space-x-2">
            <?php echo $form->checkBox($model, 'rememberMe', ['class' => 'form-checkbox h-4 w-4 text-blue-600']); ?>
            <?php echo $form->label($model, 'rememberMe', ['class' => 'text-gray-700 select-none']); ?>
            <?php echo $form->error($model, 'rememberMe', ['class' => 'text-red-600 text-sm']); ?>
        </div>

        <div>
            <?php echo CHtml::submitButton('Login', [
                'class' => 'w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition font-semibold',
            ]); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>
