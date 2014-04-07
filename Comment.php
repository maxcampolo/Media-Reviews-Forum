<?php
class Comment extends AppModel {
	public $validate = array(
		'body' => array('rule' => 'notEmpty')
	);
	public $belongsTo = array('Review' , 'User');
}
?>