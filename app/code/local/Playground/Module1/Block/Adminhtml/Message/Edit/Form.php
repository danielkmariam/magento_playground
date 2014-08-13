<?php

/**
 * Class Playground_Module1_Block_Adminhtml_Message_Edit_Form
 */
class Playground_Module1_Block_Adminhtml_Message_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $message = $this->_getMessage();

        $form = new Varien_Data_Form(
            array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save', array('_current' => true, 'continue' => 0)),
                'method' => 'post',
            )
        );

        $fieldset = $form->addFieldset(
            'general',
            array(
                'legend' => $this->__('Message Details')
            )
        );

        if ($message->getId()) {
            $fieldset->addField('id', 'hidden', array('name' => 'id', 'value' => $message->getId()));
        }

        $fieldset->addField(
            'referrer_email', 'text',
            array(
                'name'      => 'referrer_email',
                'label'     => $this->__('Referrer email'),
                'title'     => $this->__('Referrer email'),
                'required'  => true,
                'value'     => $message->getReferrerEmail(),
                'class'     => 'validate-email'
            )
        );

        $fieldset->addField(
            'referrer_name', 'text',
            array(
                'name'      => 'referrer_name',
                'label'     => $this->__('Referrer name'),
                'title'     => $this->__('Referrer name'),
                'required'  => true,
                'value'     => $message->getReferrerName()
            )
        );

        $fieldset->addField(
            'recipient_email', 'text',
            array(
                'name'      => 'recipient_email',
                'label'     => $this->__('Recipient email'),
                'title'     => $this->__('Recipient email'),
                'required'  => true,
                'value'     => $message->getRecipientEmail(),
                'class'     => 'validate-email'
            )
        );

        $fieldset->addField(
            'recipient_name', 'text',
            array(
                'name'      => 'recipient_name',
                'label'     => $this->__('Recipient name'),
                'title'     => $this->__('Recipient name'),
                'required'  => true,
                'value'     => $message->getRecipientName()
            )
        );

        $fieldset->addField(
            'message', 'textarea',
            array(
                'name'      => 'message',
                'label'     => $this->__('Message'),
                'title'     => $this->__('Message'),
                'required'  => true,
                'value'     => $message->getMessage()
            )
        );

        $form->setAction($this->getUrl('*/*/save'));
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Retrieve the existing message for pre-populating the form fields.
     *
     * @return Playground_Module1_Model_Message
     */
    protected function _getMessage()
    {
        $message = Mage::registry('current_message');
        if (!$message instanceof Playground_Module1_Model_Message) {
            $message = Mage::getModel('module1/message');
        }

        return $message;
    }
}