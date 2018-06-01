<?php

class ConnexionController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
			
    }
	
		
    
	  public function connexionAction()
    {
        	$dbD = new Model_DbTable_Connexion();
			$arr = $dbD->connect();
		
    }

	

}

