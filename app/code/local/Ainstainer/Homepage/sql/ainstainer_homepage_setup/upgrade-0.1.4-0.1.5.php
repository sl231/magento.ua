<?php

$installer = $this;
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$installer->startSetup();

$setup->addAttributeGroup('catalog_product', 'Default', 'Special Attributes', 1000);

$setup->addAttribute('catalog_product', 'test_attribute', array(
    'group'     	=> 'Special Attributes',
    'label'             => 'Slide',
    'type'              => 'int',
    'input'             => 'select',
    'backend'           => '',//'eav/entity_attribute_backend_array',
    'frontend'          => '',
    'source'            => 'ainstainer_homepage/source_slide',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible'           => true,
    'required'          => false,
    'user_defined'      => true,
    'searchable'        => false,
    'filterable'        => false,
    'comparable'        => false,
    'visible_on_front'  => true,
    'visible_in_advanced_search' => true,
    'unique'            => false
));

$installer->endSetup();