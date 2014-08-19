<?php

require_once 'Mage/Checkout/controllers/OnepageController.php';
class Playground_Module2Task2_Checkout_OnepageController extends Mage_Checkout_OnepageController
{
    public function saveShippingAction()
    {
        $quote = $this->getOnepage()->getQuote();
        $quote->setUserComment($this->getRequest()->getPost('user_comment'));

        parent::saveShippingAction();
    }
}