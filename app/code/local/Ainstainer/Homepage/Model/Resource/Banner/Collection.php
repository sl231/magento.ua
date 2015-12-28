<?php

class Ainstainer_Homepage_Model_Resource_Banner_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init("ainstainer_homepage/banner");
    }

    /**
     * @return array
     */
    public function getDataForSource()
    {
        $data = $this->addFieldToSelect(['banner_id','title'])->getData();
        $res = [];
        foreach($data as $banner) {
            $res[$banner['banner_id']] = $banner['title'];
        }

        return $res;
    }
}
