<?php
class From extends AppModel {
	public $validate = array(
		'username' => array('rule' => 'notEmpty'),
		'password' => array('rule' => 'notEmpty')	
	);
	public $hasMany = array('Message');
}
?>