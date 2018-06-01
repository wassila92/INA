<?php

/**
 * Classe ORM qui représente la table 'connexion'.
 *
 * @author Samuel Szoniecky
 * @category   Zend
 * @package Zend\DbTable\Flux
 * @license https://creativecommons.org/licenses/by-sa/2.0/fr/ CC BY-SA 2.0 FR
 * @version  $Id:$
 */

class Model_DbTable_Connexion extends Zend_Db_Table_Abstract
{
    
    /**
     * Nom de la table.
     */
    protected $_name = 'connexion';
    
    /**
     * Clef primaire de la table.
     */
    protected $_primary = 'idconnexion';

	protected $_dependentTables = array(
		'Model_DbTable_Flux_Rapport'
		);
		
   
   
    /**
     * Récupère toutes les entrées flux_doc avec certains critères
     * de tri, intervalles
     *
     * @return array
     */
    public function getAll($order=null, $limit=0, $from=0)
    {
        $query = $this->select()
                    ->from( array("connexion" => "connexion") );
                    
        if($order != null)
        {
            $query->order($order);
        }

        if($limit != 0)
        {
            $query->limit($limit, $from);
			
        }
	
        return $this->fetchAll($query)->toArray();
    }
	
	 public function connect()
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

?>

<?php
class Application_Model_DbTable_connexion extends Zend_Db_Table_Abstract
{
    /** Table name */
    protected $_name    = 'connexion';

}