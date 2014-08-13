<?php

Mage::getModel('module1/message')->setData(
    array(
        'referrer_email'    => 'My@email.address',
        'referrer_name'     => 'My name',
        'recipient_email'   => 'My@friends.email.address ',
        'recipient_name'    => 'My friends name',
        'message'           => 'Message text to my friend.'
    )
)->save();