<?php

/**
 * This is the model class for table "log".
 *
 * The followings are the available columns in table 'log':
 * @property string $log_id
 * @property string $log_user_id
 * @property string $log_user_type
 * @property string $log_text
 * @property string $log_affected_entity
 * @property string $log_affected_id
 * @property string $log_datetime
 */
class Log extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('log_user_id, log_user_type, log_text, log_affected_entity, log_affected_id, log_datetime', 'required'),
			array('log_user_id, log_affected_id', 'length', 'max'=>11),
			array('log_user_type', 'length', 'max'=>5),
			array('log_affected_entity', 'length', 'max'=>48),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('log_id, log_user_id, log_user_type, log_text, log_affected_entity, log_affected_id, log_datetime', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'log_id' => 'Log',
			'log_user_id' => 'Log User',
			'log_user_type' => 'Log User Type',
			'log_text' => 'Log Text',
			'log_affected_entity' => 'Log Affected Entity',
			'log_affected_id' => 'Log Affected',
			'log_datetime' => 'Log Datetime',
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

		$criteria->compare('log_id',$this->log_id,true);
		$criteria->compare('log_user_id',$this->log_user_id,true);
		$criteria->compare('log_user_type',$this->log_user_type,true);
		$criteria->compare('log_text',$this->log_text,true);
		$criteria->compare('log_affected_entity',$this->log_affected_entity,true);
		$criteria->compare('log_affected_id',$this->log_affected_id,true);
		$criteria->compare('log_datetime',$this->log_datetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Log the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
