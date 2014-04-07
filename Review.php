<?php
class Review extends AppModel{
	public $validate = array(
		'title' => array('rule' => 'notEmpty'),
		'rating' => array('rule' => 'notEmpty'),
		'media' => array('rule' => 'notEmpty'),
		'body' => array('rule' => 'notEmpty')
	);
	public $belongsTo = 'User';
	public $hasMany = 'Comment';
}
?>
