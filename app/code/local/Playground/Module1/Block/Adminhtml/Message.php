<?php

class Playground_Module1_Block_Adminhtml_Message extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'module1_adminhtml';
        $this->_controller = 'message';

        $this->_headerText = $this->__('Message Manager');
        $this->_addButtonLabel = $this->__('Add Message');

        parent::__construct();
    }

    public function getCreateUrl()
    {
        return $this->getUrl('*/*/edit');
    }
}