<?php

/**
 * This is the model class for table "property".
 *
 * The followings are the available columns in table 'property':
 * @property string $property_id
 * @property string $property_type_id
 * @property string $land_id
 * @property string $property_number
 * @property string $property_name
 * @property integer $property_number_of_floors
 * @property string $property_identification_number
 * @property integer $property_maximum_units
 * @property string $property_management_fee_percent
 *
 * The followings are the available model relations:
 * @property Expense[] $expenses
 * @property PropertyType $propertyType
 * @property Land $land
 * @property Unit[] $units
 */
class Property extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'property';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('property_type_id, land_id, property_number_of_floors, property_maximum_units, property_management_fee_percent', 'required'),
			array('property_number_of_floors, property_maximum_units', 'numerical', 'integerOnly'=>true),
			array('property_type_id, land_id, property_management_fee_percent', 'length', 'max'=>11),
			array('property_number, property_name, property_identification_number', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('property_id, property_type_id, land_id, property_number, property_name, property_number_of_floors, property_identification_number, property_maximum_units, property_management_fee_percent', 'safe', 'on'=>'search'),
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
			'expenses' => array(self::HAS_MANY, 'Expense', 'property_id'),
			'propertyType' => array(self::BELONGS_TO, 'PropertyType', 'property_type_id'),
			'land' => array(self::BELONGS_TO, 'Land', 'land_id'),
			'units' => array(self::HAS_MANY, 'Unit', 'property_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'property_id' => 'Property',
			'property_type_id' => 'Property Type',
			'land_id' => 'Land',
			'property_number' => 'Property Number',
			'property_name' => 'Property Name',
			'property_number_of_floors' => 'Property Number Of Floors',
			'property_identification_number' => 'Property Identification Number',
			'property_maximum_units' => 'Property Maximum Units',
			'property_management_fee_percent' => 'Property Management Fee Percent',
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

		$criteria->compare('property_id',$this->property_id,true);
		$criteria->compare('property_type_id',$this->property_type_id,true);
		$criteria->compare('land_id',$this->land_id,true);
		$criteria->compare('property_number',$this->property_number,true);
		$criteria->compare('property_name',$this->property_name,true);
		$criteria->compare('property_number_of_floors',$this->property_number_of_floors);
		$criteria->compare('property_identification_number',$this->property_identification_number,true);
		$criteria->compare('property_maximum_units',$this->property_maximum_units);
		$criteria->compare('property_management_fee_percent',$this->property_management_fee_percent,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Property the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
