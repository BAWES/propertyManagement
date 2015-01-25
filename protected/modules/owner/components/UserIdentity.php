<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	
	public function authenticate()
	{
		$ownerRecord = Owner::model()->findByAttributes(array('owner_email'=>$this->username));
		
		if($ownerRecord===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID; 
		else if(!$ownerRecord->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID; 
		else
		{
			$this->_id=$ownerRecord->owner_id; 
			$this->setState('name', $ownerRecord->owner_first_name); 
			//user type
			$this->setState('ut','owner');
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
	
	public function getId() 
	{
		return $this->_id; 
	}
	
}