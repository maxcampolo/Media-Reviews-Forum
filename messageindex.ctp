<?php
	/*foreach ($messages as $message) {
		print_r($message);
		echo "<br />";
		echo "<br />";
	} */
?>

<?php echo $this->Html->link('Back to all reviews' , array('controller' => 'reviews' , 'action' => 'goback')); 
	echo "<br />";
	echo "<br />"; ?>

<h1>Messages</h1>

<?php

	echo "Logged in as " . $username;
	echo "<br />";
?>

<table>
	<tr>
		<th>Title</th>
		<th>From</th>
		<th>Options</th>
		<th>Created</th>
	</tr>
	
	<?php foreach ($messages as $message): ?>
	<?php if($userid == $message['Recipient']['id']) { ?>
		<tr>
			<td>
				<?php echo $this->Html->link($message['Message']['title'], array('controller' => 'messages' , 'action' => 'viewmessage' , $message['Message']['id'])); ?>
			</td>
			<td><?php echo $message['Sender']['username']; ?></td>
			<td><?php echo $this->Form->postLink('Delete', array('action' => 'deletemessage', $message['Message']['id']), array('confirm' => 'Are you sure?')); ?></td>
			<td><?php echo $message['Message']['created']; ?></td>
		</tr>
	<?php } ?>
	<?php endforeach; ?>
	<?php unset($message); ?>
</table>	