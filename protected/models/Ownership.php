<?php

/**
 * This is the model class for table "ownership".
 *
 * The followings are the available columns in table 'ownership':
 * @property string $ownership_id
 * @property string $owner_id
 * @property string $land_id
 * @property string $ownership_percentage
 * @property string $ownership_start_date
 * @property string $ownership_end_date
 *
 * The followings are the available model relations:
 * @property Owner $owner
 * @property Land $land
 */
class Ownership extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ownership';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('owner_id, land_id, ownership_percentage, ownership_start_date, ownership_end_date', 'required'),
			array('owner_id, land_id, ownership_percentage', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ownership_id, owner_id, land_id, ownership_percentage, ownership_start_date, ownership_end_date', 'safe', 'on'=>'search'),
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
			'owner' => array(self::BELONGS_TO, 'Owner', 'owner_id'),
			'land' => array(self::BELONGS_TO, 'Land', 'land_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ownership_id' => 'Ownership',
			'owner_id' => 'Owner',
			'land_id' => 'Land',
			'ownership_percentage' => 'Ownership Percentage',
			'ownership_start_date' => 'Ownership Start Date',
			'ownership_end_date' => 'Ownership End Date',
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

		$criteria->compare('ownership_id',$this->ownership_id,true);
		$criteria->compare('owner_id',$this->owner_id,true);
		$criteria->compare('land_id',$this->land_id,true);
		$criteria->compare('ownership_percentage',$this->ownership_percentage,true);
		$criteria->compare('ownership_start_date',$this->ownership_start_date,true);
		$criteria->compare('ownership_end_date',$this->ownership_end_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ownership the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
