<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if (!Yii::app()->user->isGuest) {
			$this->redirect(array('site/index'));
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionDashboard() {
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}

		$userId = Yii::app()->user->id;
    $user = Users::model()->with('employee')->findByPk($userId);

    if (!$user || !$user->employee) {
        throw new CHttpException(403, 'No employee linked to this user.');
    }

    $employeeId = $user->employee->EmployeeID;

    // Get all categories that have at least one task assigned to this employee
    $categories = TaskCategory::model()->with(array(
        'tasks' => array(
            'joinType' => 'INNER JOIN',
            'condition' => 'EXISTS (
                SELECT 1 FROM task_employee te
                WHERE te.task_id = tasks.id AND te.employee_id = :eid
            )',
            'params' => array(':eid' => $employeeId),
        )
    ))->findAll();

    $this->render('dashboard', array(
        'categories' => $categories,
    ));
	}

	public function actionAdminDashboard() {
		// Departments with employee counts
    $deptData = Yii::app()->db->createCommand("
        SELECT d.DepartmentName, COUNT(e.EmployeeID) AS EmployeeCount
        FROM department d
        LEFT JOIN employee e ON e.DepartmentID = d.DepartmentID
        GROUP BY d.DepartmentName
    ")->queryAll();

    // Totals
    $totals = Yii::app()->db->createCommand("
        SELECT
            (SELECT COUNT(*) FROM department) AS TotalDepartments,
            (SELECT COUNT(*) FROM task_category) AS TotalCategories,
            (SELECT COUNT(*) FROM task) AS TotalTasks
    ")->queryRow();

    // Task assignments
    $assignments = Yii::app()->db->createCommand("
        SELECT t.title AS TaskTitle,
               CONCAT(emp.FirstName, ' ', emp.LastName) AS AssignedTo
        FROM task t
        JOIN task_employee te ON te.task_id = t.id
        JOIN employee emp ON emp.EmployeeID = te.employee_id
    ")->queryAll();

    $this->render('adminDashboard', [
        'deptData'     => $deptData,
        'totals'       => $totals,
        'assignments'  => $assignments,
    ]);
	}

	public function actionCategoryTasks($categoryId)
{
    // Get logged-in user id
    $userId = Yii::app()->user->id;

    // Get user with employee relation
    $user = Users::model()->with('employee')->findByPk($userId);

    if (!$user || !$user->employee) {
        throw new CHttpException(403, 'No employee linked to this user.');
    }

    $employeeId = $user->employee->EmployeeID;

    // Fetch tasks for this employee and category
    $tasks = Task::model()->with('TaskCategory')->findAll(array(
        'join' => 'INNER JOIN task_employee te ON te.task_id = t.id',
        'condition' => 'te.employee_id = :eid AND t.TaskCategoryID = :cid',
        'params' => array(':eid' => $employeeId, ':cid' => $categoryId),
    ));

    // Optionally get category name or info for display
    $category = TaskCategory::model()->findByPk($categoryId);

    if (!$category) {
        throw new CHttpException(404, 'Category not found.');
    }

    // Render view with tasks and category info
    $this->render('categoryTask', [
        'tasks' => $tasks,
        'category' => $category,
    ]);
}

public function actionUpdateTaskStatus()
{
    if (Yii::app()->request->isPostRequest) {
        $data = json_decode(file_get_contents('php://input'), true);
        $taskId = $data['id'] ?? null;
        $newStatus = isset($data['status']) ? (int)$data['status'] : null;

        if ($taskId !== null && $newStatus !== null) {
            $task = Task::model()->findByPk($taskId);
            if ($task) {
                $task->status = $newStatus;
                if ($task->save(false, ['status'])) {
                    echo CJSON::encode(['success' => true]);
                    Yii::app()->end();
                }
            }
        }
    }
    echo CJSON::encode(['success' => false]);
    Yii::app()->end();
}


	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}