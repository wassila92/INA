<?php

/**
 * Classe ORM qui représente la table 'theme'.
 *
 * @author Samuel Szoniecky
 * @category   Zend
 * @package Zend\DbTable\Flux
 * @license https://creativecommons.org/licenses/by-sa/2.0/fr/ CC BY-SA 2.0 FR
 * @version  $Id:$
 */

class Model_DbTable_Theme extends Zend_Db_Table_Abstract
{
    
    /**
     * Nom de la table.
     */
    protected $_name = 'theme';
    
    /**
     * Clef primaire de la table.
     */
    protected $_primary = 'idTheme';

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
                    ->from( array("theme" => "theme") );
                    
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
    
    
}

?>

<?php
class Application_Model_DbTable_Theme extends Zend_Db_Table_Abstract
{
    /** Table name */
    protected $_name    = 'theme';

}