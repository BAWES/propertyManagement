<?php

/**
 * This is the model class for table "owner_identification".
 *
 * The followings are the available columns in table 'owner_identification':
 * @property string $identify_id
 * @property string $owner_id
 * @property string $identifytype_id
 * @property string $identify_number
 *
 * The followings are the available model relations:
 * @property Owner $owner
 * @property IdentificationType $identifytype
 */
class OwnerIdentification extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'owner_identification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('owner_id, identifytype_id, identify_number', 'required'),
			array('owner_id, identifytype_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('identify_id, owner_id, identifytype_id, identify_number', 'safe', 'on'=>'search'),
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
			'identifytype' => array(self::BELONGS_TO, 'IdentificationType', 'identifytype_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'identify_id' => 'Identify',
			'owner_id' => 'Owner',
			'identifytype_id' => 'Identifytype',
			'identify_number' => 'Identify Number',
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

		$criteria->compare('identify_id',$this->identify_id,true);
		$criteria->compare('owner_id',$this->owner_id,true);
		$criteria->compare('identifytype_id',$this->identifytype_id,true);
		$criteria->compare('identify_number',$this->identify_number,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OwnerIdentification the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
