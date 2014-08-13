<?php

/**
 * Class Playground_Module1_Model_Mysql4_Message
 */
class Playground_Module1_Model_Mysql4_Message extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init('module1/message', 'message_id');
    }
} 