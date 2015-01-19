<?php

/**
 * This is the model class for table "company".
 *
 * The followings are the available columns in table 'company':
 * @property string $company_id
 * @property string $company_name
 * @property string $company_logo
 * @property string $company_license
 * @property string $company_contact_name
 * @property string $company_contact_phone
 *
 * The followings are the available model relations:
 * @property Agent[] $agents
 * @property Land[] $lands
 * @property Owner[] $owners
 * @property Tenant[] $tenants
 */
class Company extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_name', 'required'),
			array('company_name, company_logo, company_license, company_contact_name, company_contact_phone', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('company_id, company_name, company_logo, company_license, company_contact_name, company_contact_phone', 'safe', 'on'=>'search'),
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
			'agents' => array(self::HAS_MANY, 'Agent', 'company_id'),
			'lands' => array(self::HAS_MANY, 'Land', 'company_id'),
			'owners' => array(self::HAS_MANY, 'Owner', 'company_id'),
			'tenants' => array(self::HAS_MANY, 'Tenant', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'company_id' => 'Company',
			'company_name' => 'Company Name',
			'company_logo' => 'Company Logo',
			'company_license' => 'Company License',
			'company_contact_name' => 'Company Contact Name',
			'company_contact_phone' => 'Company Contact Phone',
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

		$criteria->compare('company_id',$this->company_id,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('company_logo',$this->company_logo,true);
		$criteria->compare('company_license',$this->company_license,true);
		$criteria->compare('company_contact_name',$this->company_contact_name,true);
		$criteria->compare('company_contact_phone',$this->company_contact_phone,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Company the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
