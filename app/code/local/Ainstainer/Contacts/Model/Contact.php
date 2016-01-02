<?php

class Ainstainer_Contacts_Model_Contact extends Mage_Core_Model_Abstract {
    public function _construct()
    {
        $this->_init('ainstainer_contacts/contact');
    }

    public function validate()
    {
        $errors = array();

        $helper = Mage::helper('ainstainer_contacts');

        if (!Zend_Validate::is($this->getName(), 'NotEmpty')) {
            $errors[] = $helper->__('Name can\'t be empty');
        }

        if (!Zend_Validate::is($this->getDescription(), 'NotEmpty')) {
            $errors[] = $helper->__('Description can\'t be empty');
        }

        if (!Zend_Validate::is($this->getEmail(), 'EmailAddress')) {
            $errors[] = $helper->__('Invalid email address "%s".', $this->getEmail());
        }

        if (empty($errors)) {
            return true;
        }
        return $errors;
    }
}
