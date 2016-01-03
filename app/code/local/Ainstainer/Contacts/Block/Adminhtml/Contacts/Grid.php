<?php

class Ainstainer_Contacts_Block_Adminhtml_Contacts_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('ainstainer_contacts_grid');
        $this->setDefaultSort('contact_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('ainstainer_contacts/contact')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('ainstainer_contacts');
        $currency = (string) Mage::getStoreConfig(Mage_Directory_Model_Currency::XML_PATH_CURRENCY_BASE);

        $this->addColumn('contact_id', array(
            'header' => $helper->__('Contact #'),
            'index'  => 'contact_id'
        ));

        $this->addColumn('name', array(
            'header' => $helper->__('Name'),
            'type'   => 'text',
            'sortable'  => true,
            'index'  => 'name'
        ));

        $this->addColumn('email', array(
            'header'       => $helper->__('Email'),
            'index'        => 'email',
            'sortable'  => true,
            'type'   => 'text'
        ));

        $this->addColumn('tel', array(
            'header'       => $helper->__('Phone'),
            'index'        => 'tel',
            'sortable'  => true,
            'type'   => 'text'
        ));

        $this->addColumn('description', array(
            'header' => $helper->__('Description'),
            'index'  => 'description',
            'sortable'  => false,
            'type'   => 'text'
        ));

        return parent::_prepareColumns();
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }

    public function getRowUrl($contact)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $contact->getId(),
        ));
    }
}