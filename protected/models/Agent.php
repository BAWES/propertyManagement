<?php

/**
 * This is the model class for table "agent".
 *
 * The followings are the available columns in table 'agent':
 * @property string $agent_id
 * @property string $company_id
 * @property string $agent_name
 * @property string $agent_email
 * @property string $agent_password
 *
 * The followings are the available model relations:
 * @property Company $company
 */
class Agent extends CActiveRecord {

    private $salt = "28b206548469ce62182048fd9cf91760";

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'agent';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('company_id', 'required'),
            array('company_id', 'length', 'max' => 11),
            array('agent_name, agent_email, agent_password', 'length', 'max' => 128),
            //Re-hash password on change
            array('agent_password', 'rehashPassword', 'on' => 'changePw'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('agent_id, company_id, agent_name, agent_email, agent_password', 'safe', 'on' => 'search'),
        );
    }

    public function rehashPassword($attribute, $params) {
        $this->agent_password = $this->hashPassword($this->agent_password, $this->salt);
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord)
                $this->agent_password = $this->hashPassword($this->agent_password, $this->salt);
            return true;
        }
        else
            return false;
    }

    //checks password param if equals to current users password
    public function validatePassword($password) {
        return $this->hashPassword($password, $this->salt) === $this->agent_password;
    }

    //hashes password input using given salt
    public function hashPassword($password, $salt) {
        return md5($salt . $password);
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'agent_id' => 'Agent',
            'company_id' => 'Company',
            'agent_name' => 'Agent Name',
            'agent_email' => 'Agent Email',
            'agent_password' => 'Agent Password',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('agent_id', $this->agent_id, true);
        $criteria->compare('company_id', $this->company_id, true);
        $criteria->compare('agent_name', $this->agent_name, true);
        $criteria->compare('agent_email', $this->agent_email, true);
        $criteria->compare('agent_password', $this->agent_password, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Agent the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
