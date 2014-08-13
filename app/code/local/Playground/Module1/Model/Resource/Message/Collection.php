<?php

/**
 * Class Playground_Module1_Model_Resource_Message_Collection
 */
class Playground_Module1_Model_Resource_Message_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        parent::_construct();

        $this->_init('module1/message', 'module1/message');
    }
}