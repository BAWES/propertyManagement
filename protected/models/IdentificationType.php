<?php

/**
 * This is the model class for table "identification_type".
 *
 * The followings are the available columns in table 'identification_type':
 * @property string $identifytype_id
 * @property string $identifytype_name_en
 * @property string $identifytype_name_ar
 *
 * The followings are the available model relations:
 * @property OwnerIdentification[] $ownerIdentifications
 * @property TenantIdentification[] $tenantIdentifications
 */
class IdentificationType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'identification_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('identifytype_name_en, identifytype_name_ar', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('identifytype_id, identifytype_name_en, identifytype_name_ar', 'safe', 'on'=>'search'),
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
			'ownerIdentifications' => array(self::HAS_MANY, 'OwnerIdentification', 'identifytype_id'),
			'tenantIdentifications' => array(self::HAS_MANY, 'TenantIdentification', 'identifytype_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'identifytype_id' => 'Identifytype',
			'identifytype_name_en' => 'Identifytype Name En',
			'identifytype_name_ar' => 'Identifytype Name Ar',
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

		$criteria->compare('identifytype_id',$this->identifytype_id,true);
		$criteria->compare('identifytype_name_en',$this->identifytype_name_en,true);
		$criteria->compare('identifytype_name_ar',$this->identifytype_name_ar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IdentificationType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
