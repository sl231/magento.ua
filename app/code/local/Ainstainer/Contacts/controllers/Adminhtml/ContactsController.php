<?php

class Ainstainer_Contacts_Adminhtml_ContactsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('CMS'))->_title($this->__('Ainstainer_Contacts'));
        $this->loadLayout();
        $this->_setActiveMenu('Ainstainer_Contacts');
        $this->_addContent($this->getLayout()->createBlock('ainstainer_contacts/adminhtml_contacts'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('ainstainer_contacts/adminhtml_contacts_grid')->toHtml()
        );
    }
}