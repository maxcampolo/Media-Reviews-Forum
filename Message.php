<?php
class Message extends AppModel {
	public $validate = array(
		'body' => array('rule' => 'notEmpty'),
		'title' => array('rule' => 'notEmpty')	
	);
	public $belongsTo = array('Sender' => array('className' => 'User', 'foreignKey' => 'from_id'),
							'Recipient' => array('className' => 'User', 'foreignKey' => 'user_id'));
}
?>