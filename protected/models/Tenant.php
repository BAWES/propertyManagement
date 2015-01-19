<?php

/**
 * This is the model class for table "tenant".
 *
 * The followings are the available columns in table 'tenant':
 * @property string $tenant_id
 * @property string $company_id
 * @property string $country_id
 * @property string $tenant_first_name
 * @property string $tenant_second_name
 * @property string $tenant_third_name
 * @property string $tenant_fourth_name
 * @property string $tenant_last_name
 * @property string $tenant_work_address
 * @property string $tenant_phone1
 * @property string $tenant_phone2
 * @property string $tenant_marital_status
 *
 * The followings are the available model relations:
 * @property Contract[] $contracts
 * @property Company $company
 * @property Country $country
 * @property TenantIdentification[] $tenantIdentifications
 */
class Tenant extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tenant';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, country_id, tenant_work_address', 'required'),
			array('company_id, country_id', 'length', 'max'=>11),
			array('tenant_first_name, tenant_second_name, tenant_third_name, tenant_fourth_name, tenant_last_name, tenant_phone1, tenant_phone2', 'length', 'max'=>128),
			array('tenant_marital_status', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tenant_id, company_id, country_id, tenant_first_name, tenant_second_name, tenant_third_name, tenant_fourth_name, tenant_last_name, tenant_work_address, tenant_phone1, tenant_phone2, tenant_marital_status', 'safe', 'on'=>'search'),
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
			'contracts' => array(self::MANY_MANY, 'Contract', 'contract_tenant(tenant_id, contract_id)'),
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
			'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
			'tenantIdentifications' => array(self::HAS_MANY, 'TenantIdentification', 'tenant_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tenant_id' => 'Tenant',
			'company_id' => 'Company',
			'country_id' => 'Country',
			'tenant_first_name' => 'Tenant First Name',
			'tenant_second_name' => 'Tenant Second Name',
			'tenant_third_name' => 'Tenant Third Name',
			'tenant_fourth_name' => 'Tenant Fourth Name',
			'tenant_last_name' => 'Tenant Last Name',
			'tenant_work_address' => 'Tenant Work Address',
			'tenant_phone1' => 'Tenant Phone1',
			'tenant_phone2' => 'Tenant Phone2',
			'tenant_marital_status' => 'Tenant Marital Status',
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

		$criteria->compare('tenant_id',$this->tenant_id,true);
		$criteria->compare('company_id',$this->company_id,true);
		$criteria->compare('country_id',$this->country_id,true);
		$criteria->compare('tenant_first_name',$this->tenant_first_name,true);
		$criteria->compare('tenant_second_name',$this->tenant_second_name,true);
		$criteria->compare('tenant_third_name',$this->tenant_third_name,true);
		$criteria->compare('tenant_fourth_name',$this->tenant_fourth_name,true);
		$criteria->compare('tenant_last_name',$this->tenant_last_name,true);
		$criteria->compare('tenant_work_address',$this->tenant_work_address,true);
		$criteria->compare('tenant_phone1',$this->tenant_phone1,true);
		$criteria->compare('tenant_phone2',$this->tenant_phone2,true);
		$criteria->compare('tenant_marital_status',$this->tenant_marital_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tenant the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
