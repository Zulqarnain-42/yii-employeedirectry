<?php
/* @var $this EmployeeController */
/* @var $model Employee */

$this->breadcrumbs = array(
    'Employees' => array('index'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#employee-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<div class="max-w-7xl mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Manage Employees</h1>

    <p class="text-sm text-gray-600 mb-4">
        You may optionally enter a comparison operator
        (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>)
        at the beginning of each of your search values to specify how the comparison should be done.
    </p>

    <div class="flex justify-between items-center mb-4">
        <a href="#" class="search-button inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            🔍 Advanced Search
        </a>

        <div class="space-x-2">
            <a href="<?php echo Yii::app()->createUrl('employee/create'); ?>" 
               class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                ➕ Create Employee
            </a>

            <a href="<?php echo Yii::app()->createUrl('employee/export'); ?>" 
               class="inline-block bg-emerald-600 text-white px-4 py-2 rounded hover:bg-emerald-700 transition">
                📤 Export to CSV
            </a>
        </div>
    </div>

    <div class="search-form mb-6 hidden bg-gray-50 border border-gray-200 p-4 rounded-lg shadow">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
            'departmentList' => $departmentList,
        )); ?>
    </div>

    <div class="bg-white shadow rounded-lg overflow-x-auto p-4">
        <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'employee-grid',
            'dataProvider' => $model->search(),
            'itemsCssClass' => 'min-w-full table-auto divide-y divide-gray-200',
            'htmlOptions' => ['class' => 'w-full'],
            'pagerCssClass' => 'mt-4 flex justify-center space-x-2 text-sm',
            'columns' => array(
                array(
                    'name' => 'EmployeeID',
                    'headerHtmlOptions' => ['class' => 'bg-gray-100 px-4 py-2 text-left text-sm font-medium text-gray-600'],
                    'htmlOptions' => ['class' => 'px-4 py-2 text-gray-700'],
                ),
                array(
                    'name' => 'FirstName',
                    'headerHtmlOptions' => ['class' => 'bg-gray-100 px-4 py-2 text-left text-sm font-medium text-gray-600'],
                    'htmlOptions' => ['class' => 'px-4 py-2 text-gray-700'],
                ),
                array(
                    'name' => 'LastName',
                    'headerHtmlOptions' => ['class' => 'bg-gray-100 px-4 py-2 text-left text-sm font-medium text-gray-600'],
                    'htmlOptions' => ['class' => 'px-4 py-2 text-gray-700'],
                ),
                array(
                    'name' => 'Email',
                    'headerHtmlOptions' => ['class' => 'bg-gray-100 px-4 py-2 text-left text-sm font-medium text-gray-600'],
                    'htmlOptions' => ['class' => 'px-4 py-2 text-gray-700'],
                ),
                array(
                    'name' => 'PhoneNumber',
                    'headerHtmlOptions' => ['class' => 'bg-gray-100 px-4 py-2 text-left text-sm font-medium text-gray-600'],
                    'htmlOptions' => ['class' => 'px-4 py-2 text-gray-700'],
                ),
                array(
                    'name' => 'status',
                    'header' => 'Status',
                    'value' => '($data->status) ? "Active" : "Inactive"',
                    'filter' => array(1 => 'Active', 0 => 'Inactive'),
                    'type' => 'raw',
                    'htmlOptions' => ['class' => 'text-center px-4 py-2 text-gray-700'],
                    'headerHtmlOptions' => ['class' => 'bg-gray-100 px-4 py-2 text-center text-sm font-medium text-gray-600'],
                ),
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{view} {update} {delete}',
                    'htmlOptions' => ['class' => 'px-4 py-2'],
                    'headerHtmlOptions' => ['class' => 'bg-gray-100 px-4 py-2 text-center text-sm font-medium text-gray-600'],
                    'buttons' => array(
                        'view' => array(
                            'label' => '👁️',
                            'options' => array(
                                'title' => 'View',
                                'class' => 'inline-block bg-blue-100 text-blue-600 px-2 py-1 rounded hover:bg-blue-200 transition text-sm',
                            ),
                        ),
                        'update' => array(
                            'label' => '✏️',
                            'options' => array(
                                'title' => 'Update',
                                'class' => 'inline-block bg-yellow-100 text-yellow-700 px-2 py-1 rounded hover:bg-yellow-200 transition text-sm',
                            ),
                        ),
                        'delete' => array(
                            'label' => '🗑️',
                            'url' => 'Yii::app()->createUrl("employee/delete", array("id"=>$data->EmployeeID))',
                            'options' => array(
                                'class' => 'inline-block bg-red-100 text-red-600 px-2 py-1 rounded hover:bg-red-200 transition text-sm',
                                'onclick' => 'if(confirm("Are you sure you want to delete this employee?")) {
                                    var form = document.createElement("form");
                                    form.method = "POST";
                                    form.action = this.href;
                                    document.body.appendChild(form);
                                    form.submit();
                                }
                                return false;',
                            ),
                        ),
                    ),
                ),
            ),
        )); ?>
    </div>
</div>
