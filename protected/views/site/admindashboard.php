<?php /* @var $this SiteController */ ?>
<?php $this->pageTitle = 'Admin Dashboard'; ?>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Admin Dashboard -->
<div class="max-w-6xl mx-auto px-6 py-10">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Admin Dashboard</h1>

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
        <div class="bg-blue-100 text-blue-800 p-6 rounded-lg shadow hover:shadow-lg transition">
            <p class="text-sm uppercase font-semibold">Departments</p>
            <p class="text-3xl font-bold"><?php echo $totals['TotalDepartments']; ?></p>
        </div>
        <div class="bg-green-100 text-green-800 p-6 rounded-lg shadow hover:shadow-lg transition">
            <p class="text-sm uppercase font-semibold">Task Categories</p>
            <p class="text-3xl font-bold"><?php echo $totals['TotalCategories']; ?></p>
        </div>
        <div class="bg-purple-100 text-purple-800 p-6 rounded-lg shadow hover:shadow-lg transition">
            <p class="text-sm uppercase font-semibold">Total Tasks</p>
            <p class="text-3xl font-bold"><?php echo $totals['TotalTasks']; ?></p>
        </div>
    </div>

    <!-- Department Chart -->
    <div class="bg-white p-6 rounded-lg shadow mb-10">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Employees by Department</h2>
        <canvas id="deptChart" height="120"></canvas>
    </div>

    <!-- Task Assignments -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Task Assignments</h2>
        <ul class="list-disc list-inside text-gray-600 space-y-2">
            <?php foreach ($assignments as $row): ?>
                <li><?php echo CHtml::encode($row['TaskTitle'] . ' → ' . $row['AssignedTo']); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<!-- Chart Script -->
<script>
    const ctx = document.getElementById('deptChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_column($deptData, 'DepartmentName')); ?>,
            datasets: [{
                label: 'Employees by Department',
                data: <?php echo json_encode(array_column($deptData, 'EmployeeCount')); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
