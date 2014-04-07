<?php
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel{
	public $validate = array(
		'username' => array('rule' => 'notEmpty'),
		'password' => array('rule' => 'notEmpty')
	);
	public $hasMany = array('Review', 'Comment', 'MessageSent' => array('className' => 'Message', 'foreignKey' => 'from_id'), 
							'MessageReceived' => array('className' => 'Message' , 'foreignKey' => 'user_id'));

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
		}
		return true;
	}
}
?>
