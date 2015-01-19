<?php

/**
 * This is the model class for table "unit".
 *
 * The followings are the available columns in table 'unit':
 * @property string $unit_id
 * @property string $property_id
 * @property string $unit_type_id
 * @property string $unit_number
 * @property string $unit_rent_amount
 * @property string $unit_rent_amount_in_words_en
 * @property string $unit_rent_amount_in_words_ar
 * @property string $unit_datetime_added
 *
 * The followings are the available model relations:
 * @property Contract[] $contracts
 * @property Expense[] $expenses
 * @property Property $property
 * @property UnitType $unitType
 * @property UnitQuestionResponse[] $unitQuestionResponses
 * @property Vacancy[] $vacancies
 */
class Unit extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'unit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('property_id, unit_type_id, unit_rent_amount, unit_datetime_added', 'required'),
			array('property_id, unit_type_id, unit_rent_amount', 'length', 'max'=>11),
			array('unit_number', 'length', 'max'=>80),
			array('unit_rent_amount_in_words_en, unit_rent_amount_in_words_ar', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('unit_id, property_id, unit_type_id, unit_number, unit_rent_amount, unit_rent_amount_in_words_en, unit_rent_amount_in_words_ar, unit_datetime_added', 'safe', 'on'=>'search'),
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
			'contracts' => array(self::HAS_MANY, 'Contract', 'unit_id'),
			'expenses' => array(self::HAS_MANY, 'Expense', 'unit_id'),
			'property' => array(self::BELONGS_TO, 'Property', 'property_id'),
			'unitType' => array(self::BELONGS_TO, 'UnitType', 'unit_type_id'),
			'unitQuestionResponses' => array(self::HAS_MANY, 'UnitQuestionResponse', 'unit_id'),
			'vacancies' => array(self::HAS_MANY, 'Vacancy', 'unit_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'unit_id' => 'Unit',
			'property_id' => 'Property',
			'unit_type_id' => 'Unit Type',
			'unit_number' => 'Unit Number',
			'unit_rent_amount' => 'Unit Rent Amount',
			'unit_rent_amount_in_words_en' => 'Unit Rent Amount In Words En',
			'unit_rent_amount_in_words_ar' => 'Unit Rent Amount In Words Ar',
			'unit_datetime_added' => 'Unit Datetime Added',
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

		$criteria->compare('unit_id',$this->unit_id,true);
		$criteria->compare('property_id',$this->property_id,true);
		$criteria->compare('unit_type_id',$this->unit_type_id,true);
		$criteria->compare('unit_number',$this->unit_number,true);
		$criteria->compare('unit_rent_amount',$this->unit_rent_amount,true);
		$criteria->compare('unit_rent_amount_in_words_en',$this->unit_rent_amount_in_words_en,true);
		$criteria->compare('unit_rent_amount_in_words_ar',$this->unit_rent_amount_in_words_ar,true);
		$criteria->compare('unit_datetime_added',$this->unit_datetime_added,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Unit the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
