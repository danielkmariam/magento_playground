<?php

/* @var $installer Mage_Sales_Model_Mysql4_Setup */
$installer = $this;
$installer->startSetup();

$newAttributeCode = 'user_comment';
$newAttributeLabel = 'User Comment';

$attributeData = array(
    'type'          => 'varchar',
    'backend_type'  => 'text',
    'frontend_input' => 'text',
    'is_user_defined' => true,
    'label'         => $newAttributeLabel,
    'visible'       => true,
    'required'      => false,
    'user_defined'  => true,
    'searchable'    => false,
    'filterable'    => false,
    'comparable'    => false,
    'default'       => ''
);

//create new attributes for quote and order
$installer->addAttribute('quote', $newAttributeCode, $attributeData);
$installer->addAttribute('order', $newAttributeCode, $attributeData);

$installer->endSetup();