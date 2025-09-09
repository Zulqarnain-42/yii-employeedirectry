<h2 class="mb-6 text-2xl font-semibold text-gray-800">Task Overview</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <!-- Total Assigned Tasks Card -->
    <div class="bg-white shadow rounded border-l-4 border-blue-500 p-6">
        <h5 class="text-blue-600 text-lg font-semibold mb-2">Total Assigned Tasks</h5>
        <p class="text-5xl font-bold text-gray-900"><?php echo $assignedTaskCount; ?></p>
    </div>

    <!-- Tasks Completed Card -->
    <div class="bg-white shadow rounded border-l-4 border-red-500 p-6">
        <h5 class="text-red-600 text-lg font-semibold mb-2">Tasks Not Completed</h5>
        <p class="text-5xl font-bold text-gray-900"><?php echo $completedTaskCount; ?></p>
    </div>
</div>



<h2 class="text-2xl font-semibold mb-6 text-gray-800">Your Task Categories</h2>

<?php if (empty($categories)): ?>
    <p class="text-gray-500 italic">No task categories assigned to you.</p>
<?php else: ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        <?php foreach ($categories as $category): ?>
            <div class="p-4 border rounded shadow-sm bg-white hover:shadow-md transition-shadow duration-200">
                <?php echo CHtml::link(
                    CHtml::encode($category->name),
                    array('site/categoryTasks', 'categoryId' => $category->id),
                    ['class' => 'text-blue-600 font-medium hover:underline']
                ); ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
