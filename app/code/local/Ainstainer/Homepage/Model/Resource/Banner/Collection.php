<?php

class Ainstainer_Homepage_Model_Resource_Banner_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init("ainstainer_homepage/banner");
    }
}
