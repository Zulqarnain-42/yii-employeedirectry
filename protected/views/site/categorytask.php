<h2 class="text-2xl font-bold text-gray-800 mb-4">
    Tasks in Category: <?php echo CHtml::encode($category->name); ?>
</h2>

<?php if (empty($tasks)): ?>
    <p class="text-gray-600">No tasks found in this category for you.</p>
<?php else: ?>
    <div class="overflow-x-auto rounded border border-gray-300">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">#</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Title</th>
                    <th class="px-4 py-2 text-center font-semibold text-gray-700">Status</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Description</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($tasks as $index => $task): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-gray-800"><?php echo $index + 1; ?></td>
                        <td class="px-4 py-2 text-gray-800"><?php echo CHtml::encode($task->title); ?></td>
                        <td class="px-4 py-2 text-center">
                            <div class="flex items-center justify-center">
                                <?php
                                    echo CHtml::checkBox('status_' . $task->id, $task->status == 1, [
                                        'class' => 'task-status-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded',
                                        'data-task-id' => $task->id,
                                        'id' => 'status_checkbox_' . $task->id,
                                    ]);
                                ?>
                                <label for="status_checkbox_<?php echo $task->id; ?>" class="ml-2 text-gray-700 text-sm" id="label_status_<?php echo $task->id; ?>">
                                    <?php echo $task->status == 1 ? 'Completed' : 'Pending'; ?>
                                </label>
                            </div>
                        </td>
                        <td class="px-4 py-2 text-gray-800"><?php echo CHtml::encode($task->description); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<script>
document.querySelectorAll('.task-status-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        const taskId = this.dataset.taskId;
        const newStatus = this.checked ? 1 : 0;

        const label = document.getElementById('label_status_' + taskId);
        label.textContent = newStatus === 1 ? 'Completed' : 'Pending';

        fetch('<?php echo $this->createUrl("site/updateTaskStatus"); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': '<?php echo Yii::app()->request->csrfToken; ?>'
            },
            body: JSON.stringify({ id: taskId, status: newStatus })
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                alert('Failed to update status.');
                this.checked = !this.checked;
                label.textContent = this.checked ? 'Completed' : 'Pending';
            }
        })
        .catch(() => {
            alert('Error updating status.');
            this.checked = !this.checked;
            label.textContent = this.checked ? 'Completed' : 'Pending';
        });
    });
});
</script>
