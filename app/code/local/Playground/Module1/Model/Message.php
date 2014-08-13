<?php

/**
 * Class Playground_Module1_Model_Message
 */
class Playground_Module1_Model_Message extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init('module1/message');
    }
}