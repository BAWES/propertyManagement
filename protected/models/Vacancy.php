<?php

/**
 * This is the model class for table "vacancy".
 *
 * The followings are the available columns in table 'vacancy':
 * @property string $id
 * @property string $unit_id
 * @property string $vacancy_unit_price
 * @property string $vacancy_monthyear
 *
 * The followings are the available model relations:
 * @property Unit $unit
 */
class Vacancy extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vacancy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unit_id, vacancy_unit_price, vacancy_monthyear', 'required'),
			array('unit_id, vacancy_unit_price', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, unit_id, vacancy_unit_price, vacancy_monthyear', 'safe', 'on'=>'search'),
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
			'unit' => array(self::BELONGS_TO, 'Unit', 'unit_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'unit_id' => 'Unit',
			'vacancy_unit_price' => 'Vacancy Unit Price',
			'vacancy_monthyear' => 'Vacancy Monthyear',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('unit_id',$this->unit_id,true);
		$criteria->compare('vacancy_unit_price',$this->vacancy_unit_price,true);
		$criteria->compare('vacancy_monthyear',$this->vacancy_monthyear,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vacancy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
