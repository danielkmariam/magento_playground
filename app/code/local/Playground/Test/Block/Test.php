<?php

class Playground_Test_Block_Test extends Mage_Core_Block_Template
{
    protected $_timeFormat = 'H:i';

    public function getCurrentTime()
    {
        $date = new DateTime();
        return $date->format($this->_timeFormat);
    }
}