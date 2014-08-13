<?php

/**
 * Class Playground_Module1_Adminhtml_MessageController
 */
class Playground_Module1_Adminhtml_MessageController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        $this->loadLayout()
            ->_setActiveMenu('module1/message')
            ->_addBreadcrumb(
                Mage::helper('module1')->__('Manage Messages'),
                Mage::helper('module1')->__('Manage Messages')
            );
        return $this;
    }

    public function indexAction()
    {
        $brandBlock = $this->getLayout()->createBlock('module1_adminhtml/message');
        $this->_initAction()->_addContent($brandBlock)->renderLayout();
    }

    public function editAction()
    {
        $message = Mage::getModel('module1/message');
        if ($messageId = $this->getRequest()->getParam('id', false)) {
            $message->load($messageId);

            if ($message->getId() < 1) {
                $this->_getSession()->addError($this->__('This message no longer exists.'));
                return $this->_redirect('*/*/index');
            }
        }

        Mage::register('current_message', $message);

        $messageEditBlock = $this->getLayout()->createBlock('module1_adminhtml/message_edit');
        $this->_initAction()->_addContent($messageEditBlock)->renderLayout();
    }

    public function saveAction()
    {
        if ($postData = $this->getRequest()->getPost()) {

            $message = Mage::getModel('module1/message');
            $id = $this->getRequest()->getParam('id');

            if ($id) {
                $message->load($id);
            }
            $message->setData($postData);

            try {
                if ($id) {
                    $message->setId($id);
                }

                $message->save();

                if (!$message->getId()) {
                    Mage::throwException($this->__('Error saving message'));
                }

                $this->_getSession()->addSuccess($this->__('The message has been saved.'));

                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $message->getId()));
                } else {
                    $this->_redirect('*/*/');
                }
            } catch (Exception $e) {
                Mage::logException($e);
                $this->_getSession()->addError($e->getMessage());

                if ($message && $message->getId()) {
                    $this->_redirect('*/*/edit', array('id' => $message->getId()));
                } else {
                    $this->_redirect('*/*/');
                }
            }
        }
    }

    public function deleteAction()
    {
        $message = Mage::getModel('module1/message');

        if ($messageId = $this->getRequest()->getParam('id', false)) {
            $message->load($messageId);
        }

        if ($message->getId() < 1) {
            $this->_getSession()->addError($this->__('This message no longer exists.'));
            return $this->_redirect('*/*/index');
        }

        try {
            $message->delete();

            $this->_getSession()->addSuccess($this->__('The message has been deleted.'));
        } catch (Exception $e) {
            Mage::logException($e);
            $this->_getSession()->addError($e->getMessage());
        }

        return $this->_redirect('*/*/index');
    }

    public function massDeleteAction()
    {
        $messageIds = $this->getRequest()->getParam('message');
        if (!is_array($messageIds)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select item(s)'));
        } else {
            try {
                foreach ($messageIds as $messageId) {
                    $message = Mage::getModel('module1/message')->load($messageId);
                    $message->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('adminhtml')->__(
                        'Total of %d record(s) were successfully deleted', count($messageIds)
                    )
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
}