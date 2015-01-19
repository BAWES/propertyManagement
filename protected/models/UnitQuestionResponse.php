<?php

/**
 * This is the model class for table "unit_question_response".
 *
 * The followings are the available columns in table 'unit_question_response':
 * @property string $response_id
 * @property string $question_id
 * @property string $unit_id
 * @property string $response_text
 *
 * The followings are the available model relations:
 * @property UnitTypeQuestion $question
 * @property Unit $unit
 */
class UnitQuestionResponse extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'unit_question_response';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question_id, unit_id, response_text', 'required'),
			array('question_id, unit_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('response_id, question_id, unit_id, response_text', 'safe', 'on'=>'search'),
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
			'question' => array(self::BELONGS_TO, 'UnitTypeQuestion', 'question_id'),
			'unit' => array(self::BELONGS_TO, 'Unit', 'unit_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'response_id' => 'Response',
			'question_id' => 'Question',
			'unit_id' => 'Unit',
			'response_text' => 'Response Text',
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

		$criteria->compare('response_id',$this->response_id,true);
		$criteria->compare('question_id',$this->question_id,true);
		$criteria->compare('unit_id',$this->unit_id,true);
		$criteria->compare('response_text',$this->response_text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UnitQuestionResponse the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
