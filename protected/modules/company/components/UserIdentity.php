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
		$agentRecord = Agent::model()->findByAttributes(array('agent_email'=>$this->username));
		
		if($agentRecord===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID; 
		else if(!$agentRecord->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID; 
		else
		{
			$this->_id=$agentRecord->admin_id; 
			$this->setState('name', $agentRecord->admin_name); 
			//user type
			$this->setState('ut','agent');
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
	
	public function getId() 
	{
		return $this->_id; 
	}
	
}