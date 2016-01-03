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

    public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        Mage::register('current_contact', Mage::getModel('ainstainer_contacts/contact')->load($id));
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('ainstainer_contacts/adminhtml_contacts_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            $model = Mage::getModel('ainstainer_contacts/contact');
            $model->setData($data)->setId($this->getRequest()->getParam('id'));

            $validate = $model->validate();
            if($validate===true) {
                try {
                    $model->save();
                    Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Contact was saved successfully'));
                    Mage::getSingleton('adminhtml/session')->setFormData(false);
                    $this->_redirect('*/*/');
                } catch (Exception $e) {
                    Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                    Mage::getSingleton('adminhtml/session')->setFormData($data);
                    $this->_redirect('*/*/edit', array(
                        'id' => $this->getRequest()->getParam('id')
                    ));
                }
            } else {
                Mage::getSingleton('adminhtml/session')->addError(print_r($validate, true));
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'id' => $this->getRequest()->getParam('id')
                ));
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('ainstainer_contacts/contact')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Contact was deleted successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }

}