<?php

/**
 * This is the model class for table "receipt_payment".
 *
 * The followings are the available columns in table 'receipt_payment':
 * @property string $payment_id
 * @property string $receipt_id
 * @property string $payment_amount
 * @property string $payment_datetime
 *
 * The followings are the available model relations:
 * @property Receipt $receipt
 */
class ReceiptPayment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'receipt_payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('receipt_id, payment_amount, payment_datetime', 'required'),
			array('receipt_id, payment_amount', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('payment_id, receipt_id, payment_amount, payment_datetime', 'safe', 'on'=>'search'),
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
			'receipt' => array(self::BELONGS_TO, 'Receipt', 'receipt_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'payment_id' => 'Payment',
			'receipt_id' => 'Receipt',
			'payment_amount' => 'Payment Amount',
			'payment_datetime' => 'Payment Datetime',
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

		$criteria->compare('payment_id',$this->payment_id,true);
		$criteria->compare('receipt_id',$this->receipt_id,true);
		$criteria->compare('payment_amount',$this->payment_amount,true);
		$criteria->compare('payment_datetime',$this->payment_datetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ReceiptPayment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
