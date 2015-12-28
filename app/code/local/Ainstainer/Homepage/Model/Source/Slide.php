<?php

class Ainstainer_Homepage_Model_Source_Slide extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
    public function getAllOptions()
    {

        $slides = Mage::getModel('ainstainer_homepage/banner')->getCollection()->getDataForSource();

        array_unshift($slides, array(
            'value' => '',
            'label' => '-- Please Select Slide --',
        ));

        return $slides;
    }
}