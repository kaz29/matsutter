<?php
App::import('Core', 'HttpSocket');
App::import('Core', 'Xml');

class Tweet extends AppModel {
  public $useTable = false;
  
	var $validate = array(
		'status' => array(
			'maxLength' => array('rule' => array('between', 1, 140), 'allowEmpty' => false)
		)
  ) ;
  
  function make_url( $type, $p1 = null ) {
	  $url = sprintf( Configure::read('Tweet.url'), Configure::read('Tweet.username'), Configure::read('Tweet.password') ) ;
	  $fmt = Configure::read("Tweet.path.{$type}") ;
	  if ( !$fmt ) 
	    return false ;
	    
	  $url .= sprintf( $fmt, $p1 ) ;
	  
	  return $url ;
  }
  
	function save($data = null, $validate = true, $fieldList = array()) {	  
	  if ( is_null($this->data) ) 
	    return false ;
	  if ( !$url = $this->make_url('update') ) 
	    return false ;

		$this->connection = new HttpSocket();
		$result = $this->connection->post($url, $this->data['Tweet']);
    $Xml = new Xml($result);
	  $result = $Xml->toArray();
		if (isset($result['Status']['id']) && is_numeric($result['Status']['id']))
			return true;
	  
		return false;
  }
}
