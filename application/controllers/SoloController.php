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
			
			
		}

	

}



