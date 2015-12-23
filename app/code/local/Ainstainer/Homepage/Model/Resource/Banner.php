<?php

class Ainstainer_Homepage_Model_Resource_Banner extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init("ainstainer_homepage/banner",'banner_id');
    }
}
