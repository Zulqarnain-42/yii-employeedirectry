<?php

/**
 * This is the model class for table "employee".
 *
 * The followings are the available columns in table 'employee':
 * @property integer $EmployeeID
 * @property string $FirstName
 * @property string $LastName
 * @property string $Email
 * @property string $PhoneNumber
 * @property string $HireDate
 * @property string $JobTitle
 * @property string $Salary
 * @property integer $DepartmentID
 * @property string $CreatedAt
 * @property string $UpdatedAt
 */
class Employee extends CActiveRecord
{
	public $ProfileImage;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'employee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FirstName, LastName, Email, HireDate', 'required'),
			array('DepartmentID', 'numerical', 'integerOnly'=>true),
			array('FirstName, LastName', 'length', 'max'=>50),
			array('Email, JobTitle', 'length', 'max'=>100),
			array('PhoneNumber', 'length', 'max'=>20),
			array('status', 'boolean'),
			array('Salary', 'length', 'max'=>10),
			array('CreatedAt, UpdatedAt', 'safe'),
			array('ProfileImage', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('EmployeeID, FirstName, LastName, Email, PhoneNumber, HireDate, JobTitle, Salary, DepartmentID, CreatedAt, UpdatedAt,status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'department' => array(self::BELONGS_TO, 'Department', 'DepartmentID'),
			'tasks' => array(self::MANY_MANY, 'Task', 'task_employee(employee_id, task_id)'),
			'user' => [self::HAS_ONE, 'User', 'EmployeeID'],
		);
	}

	public function getFullName()
	{
		return $this->FirstName . ' ' . $this->LastName;
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'EmployeeID' => 'Employee',
			'FirstName' => 'First Name',
			'LastName' => 'Last Name',
			'Email' => 'Email',
			'PhoneNumber' => 'Phone Number',
			'HireDate' => 'Hire Date',
			'JobTitle' => 'Job Title',
			'Salary' => 'Salary',
			'DepartmentID' => 'Department',
			'CreatedAt' => 'Created At',
			'UpdatedAt' => 'Updated At',
			'ProfileImage' => 'Profile Image',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('EmployeeID',$this->EmployeeID);
		$criteria->compare('FirstName',$this->FirstName,true);
		$criteria->compare('LastName',$this->LastName,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('PhoneNumber',$this->PhoneNumber,true);
		$criteria->compare('HireDate',$this->HireDate,true);
		$criteria->compare('JobTitle',$this->JobTitle,true);
		$criteria->compare('Salary',$this->Salary,true);
		$criteria->compare('DepartmentID',$this->DepartmentID);
		$criteria->compare('CreatedAt',$this->CreatedAt,true);
		$criteria->compare('UpdatedAt',$this->UpdatedAt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Employee the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
