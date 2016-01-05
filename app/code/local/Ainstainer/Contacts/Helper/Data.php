<?php

class Ainstainer_Contacts_Helper_Data extends Mage_Contacts_Helper_Data
{
    /**
     * @return string
     */
    public function getUserName()
    {
        if (parent::getUserName()=='') {
            return 'Joe';
        }
        return parent::getUserName();
    }
}
