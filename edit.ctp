<h1>Edit Review</h1>
<?php
echo $this->Form->create('Review');
echo $this->Form->input('title');
echo $this->Form->input('rating', array('type'=>'select', 'options'=>range(1,10,1)));
echo $this->Form->input('media');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Review');
?>
