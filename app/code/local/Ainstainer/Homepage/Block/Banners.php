<?php

class Ainstainer_Homepage_Block_Banners extends Mage_Core_Block_Template
{
    public function getBannerCollection()
    {
        /* @var $bannersCollection Ainstainer_Homepage_Model_Banner*/
        $bannersCollection = Mage::getModel('ainstainer_homepage/banner')->getCollection()
            ->addFilter('status',1)
            ->setOrder('position','ASC');

        return $bannersCollection;
    }
}