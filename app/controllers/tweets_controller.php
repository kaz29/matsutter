<?php
class TweetsController extends AppController
{
  var $uses = array('Tweet') ;
  var $layout = "tweet" ;
  var $helpers = array('Time') ;
  
  function __construct() 
  {
    parent::__construct() ;
    config('tweets') ;
  }
    
  function index()
  {
  }
  
  function add() {
    if ( !empty($this->data) ) {
			$this->Tweet->set($this->data);
  	  if ( $this->Tweet->validates() ) {
  			if ($this->Tweet->save()) {
          $this->Session->setFlash(__('The tweet has been saved', true));
		      $this->redirect(array('action'=>'index'));
  			} else {
          $this->Session->setFlash(__('The tweet could not be saved. Please, try again.',true));
  			}
  	  } else {
				$this->Session->setFlash(__('Please correct errors below.', true));
      } 
    }
  }
}
