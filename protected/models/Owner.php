<?php

/**
 * This is the model class for table "owner".
 *
 * The followings are the available columns in table 'owner':
 * @property string $owner_id
 * @property string $company_id
 * @property string $country_id
 * @property string $owner_first_name
 * @property string $owner_second_name
 * @property string $owner_third_name
 * @property string $owner_last_name
 * @property string $owner_work_address
 * @property string $owner_phone1
 * @property string $owner_phone2
 * @property string $owner_email
 * @property string $owner_password
 *
 * The followings are the available model relations:
 * @property Company $company
 * @property Country $country
 * @property OwnerIdentification[] $ownerIdentifications
 * @property Ownership[] $ownerships
 */
class Owner extends CActiveRecord {

    private $salt = "28b206548469ce62182048fd9cf91760";

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'owner';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('company_id, country_id, owner_work_address', 'required'),
            array('company_id, country_id', 'length', 'max' => 11),
            array('owner_first_name, owner_second_name, owner_third_name, owner_last_name, owner_phone1, owner_phone2, owner_email, owner_password', 'length', 'max' => 128),
            //Re-hash password on change
            array('owner_password', 'rehashPassword', 'on' => 'changePw'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('owner_id, company_id, country_id, owner_first_name, owner_second_name, owner_third_name, owner_last_name, owner_work_address, owner_phone1, owner_phone2, owner_email, owner_password', 'safe', 'on' => 'search'),
        );
    }

    public function rehashPassword($attribute, $params) {
        $this->owner_password = $this->hashPassword($this->owner_password, $this->salt);
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord)
                $this->owner_password = $this->hashPassword($this->owner_password, $this->salt);
            return true;
        }
        else
            return false;
    }

    //checks password param if equals to current users password
    public function validatePassword($password) {
        return $this->hashPassword($password, $this->salt) === $this->owner_password;
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
            'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
            'ownerIdentifications' => array(self::HAS_MANY, 'OwnerIdentification', 'owner_id'),
            'ownerships' => array(self::HAS_MANY, 'Ownership', 'owner_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'owner_id' => 'Owner',
            'company_id' => 'Company',
            'country_id' => 'Country',
            'owner_first_name' => 'Owner First Name',
            'owner_second_name' => 'Owner Second Name',
            'owner_third_name' => 'Owner Third Name',
            'owner_last_name' => 'Owner Last Name',
            'owner_work_address' => 'Owner Work Address',
            'owner_phone1' => 'Owner Phone1',
            'owner_phone2' => 'Owner Phone2',
            'owner_email' => 'Owner Email',
            'owner_password' => 'Owner Password',
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

        $criteria->compare('owner_id', $this->owner_id, true);
        $criteria->compare('company_id', $this->company_id, true);
        $criteria->compare('country_id', $this->country_id, true);
        $criteria->compare('owner_first_name', $this->owner_first_name, true);
        $criteria->compare('owner_second_name', $this->owner_second_name, true);
        $criteria->compare('owner_third_name', $this->owner_third_name, true);
        $criteria->compare('owner_last_name', $this->owner_last_name, true);
        $criteria->compare('owner_work_address', $this->owner_work_address, true);
        $criteria->compare('owner_phone1', $this->owner_phone1, true);
        $criteria->compare('owner_phone2', $this->owner_phone2, true);
        $criteria->compare('owner_email', $this->owner_email, true);
        $criteria->compare('owner_password', $this->owner_password, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Owner the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
