<?php /* @var $this SiteController */ ?>
<?php $this->pageTitle=Yii::app()->name; ?>

<!-- Hero Section -->
<div class="bg-blue-600 text-white py-16 px-6 rounded-lg shadow-md mb-10">
    <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome to <?php echo CHtml::encode(Yii::app()->name); ?></h1>
        <p class="text-lg mb-6">Your lightweight HR system to manage employees, departments, and tasks with ease.</p>
        <?php if(Yii::app()->user->isGuest): ?>
            <a href="<?php echo Yii::app()->createUrl('/site/login'); ?>" class="bg-white text-blue-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition">Login</a>
        <?php else: ?>
            <?php if(Yii::app()->user->is_admin): ?>
                <a href="<?php echo Yii::app()->createUrl('/site/admindashboard'); ?>" class="bg-white text-blue-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition">Admin Dashboard</a>
            <?php else: ?>
                <a href="<?php echo Yii::app()->createUrl('/site/dashboard'); ?>" class="bg-white text-blue-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition">Dashboard</a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<!-- Features Section -->
<div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-xl font-semibold text-blue-700 mb-2">Employee Management</h2>
        <p class="text-gray-600">Add, edit, and manage employee profiles including contact details and job roles.</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-xl font-semibold text-blue-700 mb-2">Department Directory</h2>
        <p class="text-gray-600">Organize your team with department-based classification for easier management.</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-xl font-semibold text-blue-700 mb-2">Task Tracking</h2>
        <p class="text-gray-600">Assign and track employee tasks by categories and completion status.</p>
    </div>
</div>

<!-- Optional Welcome Note or Info Box -->
<div class="max-w-4xl mx-auto mt-12 bg-yellow-50 border-l-4 border-yellow-400 p-6 rounded shadow">
    <h3 class="text-lg font-semibold text-yellow-700 mb-2">Note for First-Time Users:</h3>
    <p class="text-yellow-600">Please contact your system administrator for login access if you do not already have an account.</p>
</div>
