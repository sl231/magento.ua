<?php

class Ainstainer_Contacts_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function saveAction()
    {
        $contact = Mage::getModel('ainstainer_contacts/contact');
        $postData = $this->getRequest()->getPost();
        $contact->setData($postData);

        $validate = $contact->validate();
        if($validate===true) {
            try {
                $contact->save();
            } catch (Exception $e) {
                Mage::log('Mage::getModel(ainstainer_contacts/contact)->save(): '.$e->getMessage());
            }
        } else {
            Mage::log('Mage::getModel(ainstainer_contacts/contact)->validate(): '.print_r($validate, true));
        }

        $this->_redirect('*/');
    }
}
