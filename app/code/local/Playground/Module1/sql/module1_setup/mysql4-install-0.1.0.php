<?php

/* @var $installer Playground_Module1_Model_Resource_Mysql4_Setup */
$installer = $this;
$installer->startSetup();

$options = array(
    'identity'  => true,
    'unsigned'  => true,
    'nullable'  => false,
    'primary'   => true,
);

$table = $installer->getConnection()->newTable($installer->getTable('module1/message'))
    ->addColumn('message_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, $options, 'Message id')
    ->addColumn('referrer_email', Varien_Db_Ddl_Table::TYPE_TEXT, 128, array(), 'Referrer email address')
    ->addColumn('referrer_name', Varien_Db_Ddl_Table::TYPE_TEXT, 128, array(), 'Referrer name')
    ->addColumn('recipient_email', Varien_Db_Ddl_Table::TYPE_TEXT, 128, array(), 'Recipient email address')
    ->addColumn('recipient_name', Varien_Db_Ddl_Table::TYPE_TEXT, 128, array(), 'Recipient name')
    ->addColumn('message', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(), 'Message');

$installer->getConnection()->createTable($table);

$installer->endSetup();