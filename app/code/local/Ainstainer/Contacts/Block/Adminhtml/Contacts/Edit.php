<?php

class Ainstainer_Contacts_Block_Adminhtml_Contacts_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'ainstainer_contacts';
        $this->_controller = 'adminhtml_contacts';
    }

    public function getHeaderText()
    {
        $helper = Mage::helper('ainstainer_contacts');
        $model = Mage::registry('current_contact');

        if ($model->getId()) {
            return $helper->__("Edit contact from ".$model->getName());
        }
    }

}