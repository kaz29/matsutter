<?php
App::import('Core', 'HttpSocket');
App::import('Core', 'Xml');

class Tweet extends AppModel {
  const API_URL = 'http://%s:%s@twitter.com' ;
  const API_PATH_UPDATE = '/statuses/update.xml';

  public $useTable = false;
  
	var $validate = array(
		'status' => array(
			'maxLength' => array('rule' => array('between', 1, 140), 'allowEmpty' => false)
		)
  ) ;
  
	function save($data = null, $validate = true, $fieldList = array())
	{	  
	  if ( is_null($this->data) ) 
	    return false ;
	
	  $url = sprintf( self::API_URL, Configure::read('Tweet.username'), Configure::read('Tweet.password') ) ;
	  $url .= self::API_PATH_UPDATE ;

		$this->connection = new HttpSocket();
		$result = $this->connection->post($url, $this->data['Tweet']);
		
    $Xml = new Xml($result);
	  $result = $Xml->toArray();
		if (isset($result['Status']['id']) && is_numeric($result['Status']['id'])) {
			$this->setInsertId($result['Status']['id']);
			return true;
	  }
	  
		return false;
  }
}
