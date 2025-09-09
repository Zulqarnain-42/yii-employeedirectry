<h2 class="text-2xl font-semibold mb-6 text-gray-800">Your Task Categories</h2>

<?php if (empty($categories)): ?>
    <p class="text-gray-500 italic">No task categories assigned to you.</p>
<?php else: ?>
    <ul class="list-disc list-inside space-y-2">
        <?php foreach ($categories as $category): ?>
            <li>
                <?php echo CHtml::link(
                    CHtml::encode($category->name),
                    array('site/categoryTasks', 'categoryId' => $category->id),
                    ['class' => 'text-blue-600 hover:underline transition-colors duration-150']
                ); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
