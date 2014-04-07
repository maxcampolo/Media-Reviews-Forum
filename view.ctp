<?php /* print_r($review); */?>
<?php echo $this->Html->link('Back to all reviews' , array('action' => 'goback')); 
	echo "<br />";
	echo "<br />"; ?>
<h2><?php echo h($review['Review']['title']); ?></h2>
<h1>By: <?php echo h($review['User']['username']); ?></h1>
<?php echo $this->Html->link('Send a message', array('controller' => 'messages', 'action' => 'sendmessage', $review['Review']['id'])); ?>

<p><small>Created: <?php echo $review['Review']['created']; ?></small></p>

<h1>Rating: <?php echo h($review['Review']['rating']); ?></h2>
<h1>Type: <?php echo h($review['Review']['media']); ?></h2>
<h1>Body: </h1>

<p><?php echo h($review['Review']['body']); ?></p>

<h1><small>Comments: </small></h1>

<?php
$reviewid = $review['Review']['id'];

foreach($comments as $comment): 
	if($comment['Comment']['review_id'] == $reviewid) {
		echo $comment['Comment']['body'];
		echo "<br />";
		echo "<br />"; ?>
		<p>By: <?php echo h($comment['User']['username']); 
		if ($userid == $comment['Comment']['user_id']) {
					echo $this->Html->link('Edit', array('controller' => 'comments' , 'action' => 'editComment', $comment['Comment']['id']));
					echo $this->Form->postLink('Delete', array('controller' => 'comments' , 'action' => 'deletecomment', $comment['Comment']['id']), array('confirm' => 'Are you sure?'));
			}
			else {
				echo "&nbsp;";
			}?></p>
		<p><small>Created: <?php echo $comment['Comment']['created']; ?></small></p>
	<?php } ?>
<?php endforeach;    

echo $this->Html->link('Add new comment', array('controller' => 'comments', 'action' => 'addComment', $reviewid , '?' => array('id' => $reviewid, 'userid' => $review['User']['id'])));
?>