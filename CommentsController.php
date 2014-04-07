<?php
class CommentsController extends AppController{
	public $helpers = array('Html', 'Form');
	var $uses = array('Comment', 'User', 'Review');
	
	public function addComment($id) {
		$userid = $this->Auth->user('id');
		$reviewid = $id;
		if ($userid) {
        		if ($this->request->is('post')) {
				$this->request->data['Comment']['user_id'] = $userid;
				$this->request->data['Comment']['review_id'] = $reviewid;
            			$this->Comment->create();
            			if ($this->Comment->save($this->request->data)) {
                			$this->Session->setFlash(__('Your comment has been saved.'));
                			return $this->redirect(array('controller' => 'reviews', 'action' => 'view' , $reviewid));
            			}
            			$this->Session->setFlash(__('Unable to add your comment.'));
        		}
		}
		else {
			$this->Session->setFlash(__('You must be logged in to add a comment.'));
			return $this->redirect(array('controller' => 'reviews', 'action' => 'view', $reviewid));
		}
	}
	
	public function editComment($id = null) {
		if (!$id) {
        		throw new NotFoundException(__('Invalid post'));
    		}

    		$comment = $this->Comment->findById($id);
    		if (!$comment) {
        		throw new NotFoundException(__('Invalid post'));
    		}

		$userid = $this->Auth->user('id');
		if ($comment['Comment']['user_id'] != $userid)
		{
			$this->Session->setFlash(__('You can not edit that comment.'));
			return $this->redirect(array('controller' => 'reviews' , 'action' => 'view', $comment['Review']['id']));
		}

		if ($this->request->is(array('post', 'put'))) {
        		$this->Comment->id = $id;
        		if ($this->Comment->save($this->request->data)) {
            			$this->Session->setFlash(__('Your comment has been updated.'));
            			return $this->redirect(array('controller' => 'reviews' , 'action' => 'view', $comment['Review']['id']));
        		}
        		$this->Session->setFlash(__('Unable to update your comment.'));
    		}

		if (!$this->request->data) {
     			$this->request->data = $comment;
    		}
	}
	
	public function deletecomment($id) {
			$comment = $this->Comment->findById($id);
			$reviewofcommentid = $comment['Review']['id'];
    		//if ($this->request->is('get')) {
			if (!$this->request->is('post') && !$this->request->is('put')) {
        		throw new MethodNotAllowedException();
    		}

		if ($this->Comment->delete($id)) {
        		$this->Session->setFlash(
            		__('The comment with id: %s has been deleted.', h($id))
        		);
        		return $this->redirect(array('controller' => 'reviews' , 'action' => 'view', $reviewofcommentid));
    		}
	}
}