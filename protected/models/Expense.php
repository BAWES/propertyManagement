<?php

/**
 * This is the model class for table "expense".
 *
 * The followings are the available columns in table 'expense':
 * @property string $expense_id
 * @property string $expense_type_id
 * @property string $property_id
 * @property string $unit_id
 * @property string $expense_amount
 * @property string $expense_reference
 * @property string $expense_description
 * @property string $expense_date
 *
 * The followings are the available model relations:
 * @property ExpenseType $expenseType
 * @property Property $property
 * @property Unit $unit
 */
class Expense extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'expense';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('expense_type_id, property_id, expense_amount, expense_description, expense_date', 'required'),
			array('expense_type_id, property_id, unit_id, expense_amount', 'length', 'max'=>11),
			array('expense_reference', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('expense_id, expense_type_id, property_id, unit_id, expense_amount, expense_reference, expense_description, expense_date', 'safe', 'on'=>'search'),
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
			'expenseType' => array(self::BELONGS_TO, 'ExpenseType', 'expense_type_id'),
			'property' => array(self::BELONGS_TO, 'Property', 'property_id'),
			'unit' => array(self::BELONGS_TO, 'Unit', 'unit_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'expense_id' => 'Expense',
			'expense_type_id' => 'Expense Type',
			'property_id' => 'Property',
			'unit_id' => 'Unit',
			'expense_amount' => 'Expense Amount',
			'expense_reference' => 'Expense Reference',
			'expense_description' => 'Expense Description',
			'expense_date' => 'Expense Date',
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

		$criteria->compare('expense_id',$this->expense_id,true);
		$criteria->compare('expense_type_id',$this->expense_type_id,true);
		$criteria->compare('property_id',$this->property_id,true);
		$criteria->compare('unit_id',$this->unit_id,true);
		$criteria->compare('expense_amount',$this->expense_amount,true);
		$criteria->compare('expense_reference',$this->expense_reference,true);
		$criteria->compare('expense_description',$this->expense_description,true);
		$criteria->compare('expense_date',$this->expense_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Expense the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
