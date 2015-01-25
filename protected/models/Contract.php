<?php

/**
 * This is the model class for table "contract".
 *
 * The followings are the available columns in table 'contract':
 * @property string $contract_id
 * @property string $unit_id
 * @property string $contract_monthly_unit_price
 * @property string $contract_start_date
 * @property string $contract_end_date
 *
 * The followings are the available model relations:
 * @property Unit $unit
 * @property Tenant[] $tenants
 * @property Receipt[] $receipts
 */
class Contract extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contract';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unit_id, contract_monthly_unit_price, contract_start_date', 'required'),
			array('unit_id, contract_monthly_unit_price', 'length', 'max'=>11),
			array('contract_end_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('contract_id, unit_id, contract_monthly_unit_price, contract_start_date, contract_end_date', 'safe', 'on'=>'search'),
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
			'tenants' => array(self::MANY_MANY, 'Tenant', 'contract_tenant(contract_id, tenant_id)'),
			'receipts' => array(self::HAS_MANY, 'Receipt', 'contract_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'contract_id' => 'Contract',
			'unit_id' => 'Unit',
			'contract_monthly_unit_price' => 'Contract Monthly Unit Price',
			'contract_start_date' => 'Contract Start Date',
			'contract_end_date' => 'Contract End Date',
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

		$criteria->compare('contract_id',$this->contract_id,true);
		$criteria->compare('unit_id',$this->unit_id,true);
		$criteria->compare('contract_monthly_unit_price',$this->contract_monthly_unit_price,true);
		$criteria->compare('contract_start_date',$this->contract_start_date,true);
		$criteria->compare('contract_end_date',$this->contract_end_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contract the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
