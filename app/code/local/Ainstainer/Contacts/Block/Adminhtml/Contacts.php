<?php

class Ainstainer_Contacts_Block_Adminhtml_Contacts extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'ainstainer_contacts';
        $this->_controller = 'adminhtml_contacts';
        $this->_headerText = Mage::helper('ainstainer_contacts')->__('Ainstainer_contacts');

        parent::__construct();
        $this->_removeButton('add');
    }
}