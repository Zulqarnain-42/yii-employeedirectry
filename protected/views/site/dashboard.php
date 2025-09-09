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
