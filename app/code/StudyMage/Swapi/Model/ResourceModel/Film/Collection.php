<?php

namespace StudyMage\Swapi\Model\ResourceModel\Film;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('StudyMage\Swapi\Model\Film','StudyMage\Swapi\Model\ResourceModel\Film');
    }
}
