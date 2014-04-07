<?php
class MessagesController extends AppController{
	public $helpers = array('Html', 'Form');
	var $uses = array('Comment', 'User', 'Review', 'Message');
	
	public function messageindex() {
		$this->set('messages', $this->Message->find('all'));
		$this->set('userid', $this->Auth->user('id'));
		$this->set('username', $this->Auth->user('username'));
	}
	
	public function sendmessage($id) {
		$fromid = $this->Auth->user('id');
		$review = $this->Review->findById($id);
		$userid = $review['Review']['user_id'];
		
		if ($this->request->is(array('post'))) {
			$this->request->data['Message']['user_id'] = $userid;
			$this->request->data['Message']['from_id'] = $fromid;
				$this->Message->create();
				if ($this->Message->save($this->request->data)) {
					$this->Session->setFlash(__('Your message has been sent.'));
					return $this->redirect(array('controller' => 'reviews', 'action' => 'view' , $id));
				}
				$this->Session->setFlash(__('Unable to add your comment.'));
		}
		
	}
	
	public function viewmessage($id = null) {
		if(!$id) {
			throw new NotFoundException('Invalid post1');
		}
		
		$message = $this->Message->findById($id);
		if(!$message) {
			throw new NotFoundException('Invalid post2');
        }
		
		$this->set('message', $message);
			
	}
	
	public function goback() {
		return $this->redirect(array('action' => 'messageindex'));
	}
	
	public function deletemessage($id) {
    		if ($this->request->is('get')) {
        		throw new MethodNotAllowedException();
    		}

		if ($this->Message->delete($id)) {
        		$this->Session->setFlash(
            		__('The message with id: %s has been deleted.', h($id))
        		);
        		return $this->redirect(array('action' => 'messageindex'));
    		}
	}
	
	public function replymessage($id) {
		
		$message = $this->Message->findById($id);
		$userid = $message['Sender']['id'];
		$fromid = $this->Auth->user('id');
		
		if ($this->request->is(array('post'))) {
			$this->request->data['Message']['user_id'] = $userid;
			$this->request->data['Message']['from_id'] = $fromid;
				$this->Message->create();
				if ($this->Message->save($this->request->data)) {
					$this->Session->setFlash(__('Your message has been sent.'));
					return $this->redirect(array('controller' => 'Messages', 'action' => 'messageindex'));
				}
				$this->Session->setFlash(__('Unable to add your comment.'));
		}
	}
}
?>