<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="language" content="en">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<!-- Tailwind CSS CDN -->
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

<div class="max-w-7xl mx-auto p-4">

	<!-- Header -->
	<header class="bg-white shadow mb-6">
		<div class="max-w-7xl mx-auto px-4 py-6 flex justify-between items-center">
			<h1 class="text-2xl font-bold text-gray-900" id="logo">
				<?php echo CHtml::encode(Yii::app()->name); ?>
			</h1>
		</div>
	</header>

	<!-- Navigation -->
	<nav class="bg-white shadow mb-6 rounded-lg">
		<ul class="flex flex-wrap space-x-4 p-4 text-gray-700">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Home', 'url'=>array('/site/index')),
					array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Dashboard', 'url'=>array('/site/dashboard'), 'visible'=>!Yii::app()->user->isGuest && !Yii::app()->user->is_admin == true),

					array('label'=>'Dashboard', 'url'=>array('/site/admindashboard'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->is_admin == true),
					array('label'=>'Department', 'url'=>array('/department/admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->is_admin == true),
					array('label'=>'Users', 'url'=>array('/users/admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->is_admin == true),
					array('label'=>'Employees', 'url'=>array('/employee/admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->is_admin == true),
					array('label'=>'Categories', 'url'=>array('/taskcategory/admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->is_admin == true),
					array('label'=>'Tasks', 'url'=>array('/task/admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->is_admin == true),
				),
				'htmlOptions' => ['class' => 'flex flex-wrap gap-4'],
				'itemCssClass' => 'text-sm font-medium hover:text-blue-600 transition',
				'activeCssClass' => 'text-blue-600 font-semibold',
			)); ?>
		</ul>
	</nav>

	<!-- Breadcrumbs -->
	<?php if(isset($this->breadcrumbs)):?>
		<div class="mb-4 text-sm text-gray-600">
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
				'htmlOptions' => ['class' => 'text-gray-500'],
			)); ?>
		</div>
	<?php endif?>

	<!-- Main Content -->
	<main class="bg-white p-6 rounded-lg shadow">
		<?php echo $content; ?>
	</main>

	<!-- Footer -->
	<footer class="mt-10 text-center text-sm text-gray-500 border-t pt-4">
		<p>&copy; <?php echo date('Y'); ?> by My Company.</p>
		<p>All Rights Reserved.</p>
		<p><?php echo Yii::powered(); ?></p>
	</footer>

</div>

</body>
</html>
