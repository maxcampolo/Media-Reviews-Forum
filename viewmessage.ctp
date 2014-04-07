<?php /*print_r($message); */?>
<?php echo $this->Html->link('Back to all messages' , array('action' => 'goback')); 
	echo "<br />";
	echo "<br />"; ?>

<h2><?php echo h($message['Message']['title']); ?></h2>
<h1>From: <?php echo h($message['Sender']['username']); ?></h1>
<h1>Body: </h1>
<p><?php echo h($message['Message']['body']); ?></p>
<?php echo "<br />"; ?>
<?php echo "<br />"; ?>

<?php echo $this->Html->link('Reply', array('controller' => 'messages', 'action' => 'replymessage', $message['Message']['id'])); ?>