<h2 class="text-xl font-bold mb-4">
    Tasks in Category: <?php echo CHtml::encode($category->name); ?>
</h2>

<?php if (empty($tasks)): ?>
    <p>No tasks found in this category for you.</p>
<?php else: ?>
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Title</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $index => $task): ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo $index + 1; ?></td>
                    <td class="border px-4 py-2"><?php echo CHtml::encode($task->title); ?></td>
                    <td class="border px-4 py-2 text-center">
                        <?php
                            echo CHtml::checkBox('status_' . $task->id, $task->status == 1, [
                                'class' => 'task-status-checkbox',
                                'data-task-id' => $task->id,
                                'id' => 'status_checkbox_' . $task->id,
                            ]);
                        ?>
                        <label for="<?php echo 'status_checkbox_' . $task->id; ?>" class="ml-2" id="label_status_<?php echo $task->id; ?>">
                            <?php echo $task->status == 1 ? 'Completed' : 'Pending'; ?>
                        </label>
                    </td>
                    <td class="border px-4 py-2"><?php echo CHtml::encode($task->description); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<script>
document.querySelectorAll('.task-status-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        var taskId = this.dataset.taskId;
        var newStatus = this.checked ? 1 : 0;

        // Update label text immediately on checkbox toggle
        var label = document.getElementById('label_status_' + taskId);
        label.textContent = newStatus === 1 ? 'Completed' : 'Pending';

        fetch('<?php echo $this->createUrl("site/updateTaskStatus"); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': '<?php echo Yii::app()->request->csrfToken; ?>'
            },
            body: JSON.stringify({id: taskId, status: newStatus})
        })
        .then(response => response.json())
        .then(data => {
            if(!data.success){
                alert('Failed to update status.');
                // revert checkbox and label on failure
                this.checked = !this.checked;
                label.textContent = this.checked ? 'Completed' : 'Pending';
            }
        })
        .catch(() => {
            alert('Error updating status.');
            // revert checkbox and label on error
            this.checked = !this.checked;
            label.textContent = this.checked ? 'Completed' : 'Pending';
        });
    });
});
</script>
