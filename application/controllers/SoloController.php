<?php

class SoloController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
			
    }
	 public function soloAction()
		{
			// action body
		
			$dbD = new Model_DbTable_Theme();
			$arr = $dbD->getAll();
		$this->view->result = array('themes'=>$arr);
			$dbD = new Model_DbTable_Connexion();
			$arr = $dbD->connect();
			
		}
		
    
	  public function connexionAction()
    {
        
		$config = new Zend_Config(
    array(
        'database' => array(
            'adapter' => 'Mysqli',
            'params' => array(
                'host'     => 'localhost',
                'dbname'   => 'root',
                'username' => 'root',
                'password' => 'geo_quizz_bd',
            )
        )
    )
);
 
$db = Zend_Db::factory($config->database);

    }

	

}



