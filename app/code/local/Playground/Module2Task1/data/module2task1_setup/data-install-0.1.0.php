<?php

/*
 * Create new attribute and assign it to set and group
 */

/* @var $installer Mage_Eav_Model_Entity_Setup */
$installer = $this;
$installer->startSetup();

$newAttributeCode = 'bed_size';
$newAttributeLabel = 'Bed Size';
$attributeEntityType = Mage_Catalog_Model_Product::ENTITY;
$attributeOptions = array(
    'value' => array(
        $newAttributeCode.'_single' => array('Single'),
        $newAttributeCode.'_double' => array('Double')
    )
);
$additionalAttributeOptions = array(
    'is_html_allowed_on_front'  => 1,
    'is_visible_on_front'       => 1,
    'is_filterable'             => 1,
    'is_configurable'           => 0,
);

$_attributeData = array(
    'type'          => 'varchar',
    'input'         => 'select',
    'label'         => $newAttributeLabel,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'required'      => '0',
    'unique'        => '0',
    'user_defined'  => '1',
    'option'        => $attributeOptions
);

//attribute group and set names to which attribute will be assigned
$attributeSetName   = 'Furniture';
$attributeGroupName = 'Furniture Attributes';

//create new attribute
$installer->addAttribute($attributeEntityType, $newAttributeCode, $_attributeData);

$attributeId = $installer->getAttributeId($attributeEntityType, $newAttributeCode);
$attributeSetId = $installer->getAttributeSetId($attributeEntityType, $attributeSetName);
$attributeGroupId = $installer->getAttributeGroupId($attributeEntityType, $attributeSetId, $attributeGroupName);

//assign newly created attribute to set and group
$installer->addAttributeToSet($attributeEntityType, $attributeSetId, $attributeGroupId, $attributeId);

//update additional fields of attribute
foreach ($additionalAttributeOptions as $key => $value) {
    $installer->updateAttribute($attributeEntityType, $attributeId, $key, $value);
}

$installer->endSetup();