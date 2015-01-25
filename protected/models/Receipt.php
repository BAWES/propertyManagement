<?php

/**
 * This is the model class for table "receipt".
 *
 * The followings are the available columns in table 'receipt':
 * @property string $receipt_id
 * @property string $contract_id
 * @property string $receipt_amount_due
 * @property string $receipt_monthyear
 * @property string $receipt_datetime_created
 * @property string $receipt_payment_status
 *
 * The followings are the available model relations:
 * @property Contract $contract
 * @property ReceiptPayment[] $receiptPayments
 */
class Receipt extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'receipt';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contract_id, receipt_amount_due, receipt_monthyear, receipt_datetime_created', 'required'),
			array('contract_id, receipt_amount_due', 'length', 'max'=>11),
			array('receipt_payment_status', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('receipt_id, contract_id, receipt_amount_due, receipt_monthyear, receipt_datetime_created, receipt_payment_status', 'safe', 'on'=>'search'),
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
			'contract' => array(self::BELONGS_TO, 'Contract', 'contract_id'),
			'receiptPayments' => array(self::HAS_MANY, 'ReceiptPayment', 'receipt_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'receipt_id' => 'Receipt',
			'contract_id' => 'Contract',
			'receipt_amount_due' => 'Receipt Amount Due',
			'receipt_monthyear' => 'Receipt Monthyear',
			'receipt_datetime_created' => 'Receipt Datetime Created',
			'receipt_payment_status' => 'Receipt Payment Status',
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

		$criteria->compare('receipt_id',$this->receipt_id,true);
		$criteria->compare('contract_id',$this->contract_id,true);
		$criteria->compare('receipt_amount_due',$this->receipt_amount_due,true);
		$criteria->compare('receipt_monthyear',$this->receipt_monthyear,true);
		$criteria->compare('receipt_datetime_created',$this->receipt_datetime_created,true);
		$criteria->compare('receipt_payment_status',$this->receipt_payment_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Receipt the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
