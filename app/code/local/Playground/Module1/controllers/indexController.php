<?php

/**
 * Class Playground_Module1_IndexController
 */
class Playground_Module1_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->getLayout()->getBlock('module1Form')->setFormAction(Mage::getUrl('*/*/post'));

        $this->_initLayoutMessages('customer/session');

        $this->renderLayout();
    }

    public function postAction()
    {
        $post = $this->getRequest()->getPost();
        if ($post) {
            $customerSession = Mage::getSingleton('customer/session');
            try {
                if (!$this->_validateInput($post)) {
                    throw new Exception();
                }

                $this->_saveData($post);

                $customerSession->addSuccess($this->__('Your message was submitted. Thank you.'));
                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                $customerSession->addError($this->__('Unable to submit your message. Please, try again later'));
                $this->_redirect('*/*/');
                return;
            }
        } else {
            $this->_redirect('*/*/');
        }
    }

    protected function _validateInput($post)
    {
        $valid = true;
        if (!Zend_Validate::is(trim($post['referrer_name']), 'NotEmpty')) {
            $valid = false;
        }

        if (!Zend_Validate::is(trim($post['referrer_email']), 'EmailAddress')) {
            $valid = false;
        }

        if (!Zend_Validate::is(trim($post['recipient_name']), 'NotEmpty')) {
            $valid = false;
        }

        if (!Zend_Validate::is(trim($post['recipient_email']), 'EmailAddress')) {
            $valid = false;
        }

        if (!Zend_Validate::is(trim($post['message']), 'NotEmpty')) {
            $valid = false;
        }
        return $valid;
    }

    protected function _saveData($post)
    {
        $message = Mage::getModel('module1/message');

        $message->setReferrerEmail($post['referrer_email']);
        $message->setReferrerName($post['referrer_name']);
        $message->setRecipientEmail($post['recipient_email']);
        $message->setRecipientName($post['recipient_name']);
        $message->setMessage($post['message']);

        $message->save();
    }
}