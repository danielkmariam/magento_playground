<?php

/**
 * Class Playground_Module1_Block_Adminhtml_Message_Edit
 */
class Playground_Module1_Block_Adminhtml_Message_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    protected function _construct()
    {
        $this->_blockGroup  = 'module1_adminhtml';
        $this->_controller  = 'message';
        $this->_mode        = 'edit';

        $newOrEdit = $this->getRequest()->getParam('id') ?
            Mage::helper('adminhtml')->__('Edit') :
            Mage::helper('adminhtml')->__('New');
        $this->_headerText =  $newOrEdit . ' ' . $this->__('Message');

        $this->_addButton(
            'save_and_continue',
            array(
                'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
                'onclick' => 'saveAndContinueEdit()',
                'class' => 'save',
            ),
            -100
        );

        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }
}