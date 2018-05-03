<?php 
class Application_Model_ThemeMapper
{
    protected $_dbTable;
 
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }
 
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Theme');
        }
        return $this->_dbTable;
    }
    public function save(Application_Model_Theme $theme)
    {
        $data = array(
            'theme_nom'   => $theme->getTheme_nom(),
     
        );
 
        if (null === ($theme_id = $themes->getTheme_id())) {
            unset($data['theme_id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('theme_id = ?' => $theme_id));
        }
    }
 
    public function find($theme_id, Application_Model_themes $theme)
    {
        $result = $this->getDbTable()->find($theme_id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $themes->set_theme_id($row->theme_id)
            ->set_theme_nom($row->theme_nom);
    }
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_theme();
            $entry->set_theme_id($row->theme_id)
            ->set_theme_nom($row->theme_nom);
            $entries[] = $entry;
        }
        return $entries;
    }
}