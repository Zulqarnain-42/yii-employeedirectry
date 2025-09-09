<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="max-w-7xl mx-auto px-4 py-8">


<h1 class="text-3xl font-bold text-gray-800 mb-4">Manage Users</h1>

<p class="text-gray-600 mb-6">
    You may optionally enter a comparison operator
    (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>)
    at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div class="flex justify-between items-center mb-6">
    <a href="#" class="search-button inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        Advanced Search
    </a>

    <a href="<?php echo Yii::app()->createUrl('users/create'); ?>" 
       class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
        ➕ Create User
    </a>
</div>

 <div class="search-form mb-6 hidden bg-gray-50 border border-gray-200 p-4 rounded-lg shadow">
        <?php $this->renderPartial('_search', array('model' => $model)); ?>
    </div>
    <div class="bg-white rounded-lg shadow overflow-x-auto p-4">

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'users-grid',
    'dataProvider'=>$model->search(),
	            'itemsCssClass' => 'min-w-full divide-y divide-gray-200 table-auto',
	'htmlOptions' => ['class' => 'w-full'],
	'pagerCssClass' => 'mt-4 flex justify-center space-x-2 text-sm',
    'columns'=>array(
		array(
			'name' => 'id',
			'htmlOptions' => ['class' => 'px-4 py-2 text-gray-700'],
			'headerHtmlOptions' => ['class' => 'px-4 py-2 bg-gray-100 text-left text-sm font-medium text-gray-600'],
		),	
		array(
			'name' => 'username',
			'htmlOptions' => ['class' => 'px-4 py-2 text-gray-700'],
			'headerHtmlOptions' => ['class' => 'px-4 py-2 bg-gray-100 text-left text-sm font-medium text-gray-600'],
		),
		array(
			'name' => 'email',
			'htmlOptions' => ['class' => 'px-4 py-2 text-gray-700'],
			'headerHtmlOptions' => ['class' => 'px-4 py-2 bg-gray-100 text-left text-sm font-medium text-gray-600'],
		),
		array(
			'name' => 'full_name',
			'htmlOptions' => ['class' => 'px-4 py-2 text-gray-700'],
			'headerHtmlOptions' => ['class' => 'px-4 py-2 bg-gray-100 text-left text-sm font-medium text-gray-600'],
		),	

        array(
            'name' => 'role',
            'value' => '($data->role) ? "admin" : "user"',  // Display admin if true, else user
            'filter' => array(0 => 'user', 1 => 'admin'),   // optional filter dropdown
						'headerHtmlOptions' => ['class' => 'px-4 py-2 bg-gray-100 text-left text-sm font-medium text-gray-600'],
						'htmlOptions' => ['class' => 'px-4 py-2 text-gray-700'],
        ),
        /*
        'is_active',
        'created_at',
        'updated_at',
        */
        array(
            'class'=>'CButtonColumn',
			'template'=>'{view} {delete}', // removed {update}
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
						'delete' => array(
							'label' => '🗑️',
							'url' => 'Yii::app()->createUrl("users/delete", array("id"=>$data->id))',
							'options' => array(
								'title' => 'Delete',
								'class' => 'inline-block bg-red-100 text-red-600 px-2 py-1 rounded hover:bg-red-200 transition text-sm',
								'onclick' => 'if(confirm("Are you sure you want to delete this user?")) {
									var form = document.createElement("form");
									form.method = "POST";
									form.action = this.href;

									// CSRF token if enabled
									var csrfToken = "' . Yii::app()->request->csrfToken . '";
									var csrfName = "' . Yii::app()->request->csrfTokenName . '";
									var input = document.createElement("input");
									input.type = "hidden";
									input.name = csrfName;
									input.value = csrfToken;
									form.appendChild(input);

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