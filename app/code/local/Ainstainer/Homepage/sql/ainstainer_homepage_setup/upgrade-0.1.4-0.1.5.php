<?php

$installer = $this;
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$installer->startSetup();

// adding attribute group
$setup->addAttributeGroup('catalog_product', 'Default', 'Special Attributes', 1000);

// the attribute added will be displayed under the group/tab Special Attributes in product edit page
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
//    'option'            => array ('value' => array('optionone' => array('Sony'),
//        'optiontwo' => array('Samsung'),
//        'optionthree' => array('Apple'),
//    )
//    ),
    'visible_on_front'  => true,
    'visible_in_advanced_search' => true,
    'unique'            => false
));

$installer->endSetup();