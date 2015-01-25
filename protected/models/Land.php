<?php

/**
 * This is the model class for table "land".
 *
 * The followings are the available columns in table 'land':
 * @property string $land_id
 * @property string $company_id
 * @property string $land_type_id
 * @property string $city_id
 * @property string $land_code
 * @property string $land_license
 * @property string $land_area
 * @property string $land_address_block
 * @property string $land_address_street
 * @property string $land_address_avenue
 * @property string $land_plot_number
 * @property string $land_number
 *
 * The followings are the available model relations:
 * @property Company $company
 * @property LandType $landType
 * @property City $city
 * @property Ownership[] $ownerships
 * @property Property[] $properties
 */
class Land extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'land';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, land_type_id, city_id, land_area', 'required'),
			array('company_id, land_type_id, city_id, land_area', 'length', 'max'=>11),
			array('land_code, land_license, land_address_block, land_address_street, land_address_avenue', 'length', 'max'=>128),
			array('land_plot_number, land_number', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('land_id, company_id, land_type_id, city_id, land_code, land_license, land_area, land_address_block, land_address_street, land_address_avenue, land_plot_number, land_number', 'safe', 'on'=>'search'),
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
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
			'landType' => array(self::BELONGS_TO, 'LandType', 'land_type_id'),
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
			'ownerships' => array(self::HAS_MANY, 'Ownership', 'land_id'),
			'properties' => array(self::HAS_MANY, 'Property', 'land_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'land_id' => 'Land',
			'company_id' => 'Company',
			'land_type_id' => 'Land Type',
			'city_id' => 'City',
			'land_code' => 'Land Code',
			'land_license' => 'Land License',
			'land_area' => 'Land Area',
			'land_address_block' => 'Land Address Block',
			'land_address_street' => 'Land Address Street',
			'land_address_avenue' => 'Land Address Avenue',
			'land_plot_number' => 'Land Plot Number',
			'land_number' => 'Land Number',
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

		$criteria->compare('land_id',$this->land_id,true);
		$criteria->compare('company_id',$this->company_id,true);
		$criteria->compare('land_type_id',$this->land_type_id,true);
		$criteria->compare('city_id',$this->city_id,true);
		$criteria->compare('land_code',$this->land_code,true);
		$criteria->compare('land_license',$this->land_license,true);
		$criteria->compare('land_area',$this->land_area,true);
		$criteria->compare('land_address_block',$this->land_address_block,true);
		$criteria->compare('land_address_street',$this->land_address_street,true);
		$criteria->compare('land_address_avenue',$this->land_address_avenue,true);
		$criteria->compare('land_plot_number',$this->land_plot_number,true);
		$criteria->compare('land_number',$this->land_number,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Land the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
