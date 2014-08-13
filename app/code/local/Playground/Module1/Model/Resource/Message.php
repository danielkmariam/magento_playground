<?php

/**
 * Class Playground_Module1_Model_Resource_Message
 */
class Playground_Module1_Model_Resource_Message extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('module1/message', 'message_id');
    }
}