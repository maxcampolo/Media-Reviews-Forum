<h1>Add Comment</h1>
<?php
$reviewid = $this->params['url']['id'];
$userid = $this->params['url']['userid'];
echo $this->Form->create('Comment');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save Comment');
?>