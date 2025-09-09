<?php
/* @var $this DepartmentController */
/* @var $model Department */

$this->breadcrumbs = array(
    'Departments' => array('index'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#department-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<div class="max-w-7xl mx-auto px-4 py-8">
<h1 class="text-3xl font-bold text-gray-800 mb-4">Manage Departments</h1>

<p class="text-gray-600 mb-6">
    You may optionally enter a comparison operator
    (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>)
    at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div class="flex justify-between items-center mb-6">
    <a href="#" class="search-button inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        Advanced Search
    </a>

    <a href="<?php echo Yii::app()->createUrl('department/create'); ?>" 
       class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
        ➕ Create Department
    </a>
</div>


    <div class="search-form mb-6 hidden bg-gray-50 border border-gray-200 p-4 rounded-lg shadow">
        <?php $this->renderPartial('_search', array('model' => $model)); ?>
    </div>

    <div class="bg-white rounded-lg shadow overflow-x-auto p-4">
        <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'department-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'itemsCssClass' => 'min-w-full divide-y divide-gray-200 table-auto',
            'htmlOptions' => ['class' => 'w-full'],
            'pagerCssClass' => 'mt-4 flex justify-center space-x-2 text-sm',
            'columns' => array(
                array(
                    'name' => 'DepartmentID',
                    'htmlOptions' => ['class' => 'px-4 py-2 text-gray-700'],
                    'headerHtmlOptions' => ['class' => 'px-4 py-2 bg-gray-100 text-left text-sm font-medium text-gray-600'],
                ),
                array(
                    'name' => 'DepartmentName',
                    'htmlOptions' => ['class' => 'px-4 py-2 text-gray-700'],
                    'headerHtmlOptions' => ['class' => 'px-4 py-2 bg-gray-100 text-left text-sm font-medium text-gray-600'],
                ),
                array(
                    'name' => 'Location',
                    'htmlOptions' => ['class' => 'px-4 py-2 text-gray-700'],
                    'headerHtmlOptions' => ['class' => 'px-4 py-2 bg-gray-100 text-left text-sm font-medium text-gray-600'],
                ),
                array(
                    'name' => 'CreatedAt',
                    'htmlOptions' => ['class' => 'px-4 py-2 text-gray-700'],
                    'headerHtmlOptions' => ['class' => 'px-4 py-2 bg-gray-100 text-left text-sm font-medium text-gray-600'],
                ),
                array(
    'class' => 'CButtonColumn',
    'template' => '{view} {update} {delete}',
    'htmlOptions' => ['class' => 'px-4 py-2'],
    'headerHtmlOptions' => ['class' => 'px-4 py-2 bg-gray-100 text-left text-sm font-medium text-gray-600'],
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
            'options' => array(
                'title' => 'Delete',
                'class' => 'inline-block bg-red-100 text-red-600 px-2 py-1 rounded hover:bg-red-200 transition text-sm',
            ),
        ),
    ),
),

            ),
        )); ?>
    </div>
</div>
