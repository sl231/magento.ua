<?php

class Ainstainer_Contacts_Block_Adminhtml_Contacts_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $helper = Mage::helper('ainstainer_contacts');
        $model = Mage::registry('current_contact');

        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array(
                'id' => $this->getRequest()->getParam('id')
            )),
            'method' => 'post',
            'enctype' => 'multipart/form-data'
        ));

        $this->setForm($form);

        $fieldset = $form->addFieldset('contact_form', array('legend' => $helper->__('Contact information')));

        $fieldset->addField('name', 'text', array(
            'label' => $helper->__('Name'),
            'required' => true,
            'class' => 'required-entry',
            'name' => 'name',
        ));

        $fieldset->addField('email', 'text', array(
            'label' => $helper->__('Email'),
            'required' => true,
            'class' => 'validate-email required-entry',
            'name' => 'email',
        ));

        $fieldset->addField('tel', 'text', array(
            'label' => $helper->__('Phone'),
            'required' => false,
            'name' => 'tel',
        ));

        $fieldset->addField('description', 'textarea', array(
            'label' => $helper->__('Description'),
            'required' => true,
            'class' => 'required-entry',
            'name' => 'description',
        ));

        $form->setUseContainer(true);

        if($data = Mage::getSingleton('adminhtml/session')->getFormData()){
            $form->setValues($data);
        } else {
            $form->setValues($model->getData());
        }

        return parent::_prepareForm();
    }

}