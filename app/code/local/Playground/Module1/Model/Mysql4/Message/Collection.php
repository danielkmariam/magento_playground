<?php

/**
 * Class Playground_Module1_Model_Mysql4_Message_Collection
 */
class Playground_Module1_Model_Mysql4_Message_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('module1/message');
    }
}