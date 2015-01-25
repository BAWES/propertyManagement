<?php

/**
 * This is the model class for table "unit_type_question".
 *
 * The followings are the available columns in table 'unit_type_question':
 * @property string $question_id
 * @property string $unit_type_id
 * @property string $question_text
 * @property string $question_response_type
 *
 * The followings are the available model relations:
 * @property UnitQuestionResponse[] $unitQuestionResponses
 * @property UnitType $unitType
 */
class UnitTypeQuestion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'unit_type_question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unit_type_id, question_text', 'required'),
			array('unit_type_id', 'length', 'max'=>11),
			array('question_response_type', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('question_id, unit_type_id, question_text, question_response_type', 'safe', 'on'=>'search'),
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
			'unitQuestionResponses' => array(self::HAS_MANY, 'UnitQuestionResponse', 'question_id'),
			'unitType' => array(self::BELONGS_TO, 'UnitType', 'unit_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'question_id' => 'Question',
			'unit_type_id' => 'Unit Type',
			'question_text' => 'Question Text',
			'question_response_type' => 'Question Response Type',
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

		$criteria->compare('question_id',$this->question_id,true);
		$criteria->compare('unit_type_id',$this->unit_type_id,true);
		$criteria->compare('question_text',$this->question_text,true);
		$criteria->compare('question_response_type',$this->question_response_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UnitTypeQuestion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
