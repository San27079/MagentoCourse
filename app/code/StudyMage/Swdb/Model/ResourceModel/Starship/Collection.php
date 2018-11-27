<?php
namespace StudyMage\Swdb\Model\ResourceModel\Starship;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('StudyMage\Swdb\Model\Starship','StudyMage\Swdb\Model\ResourceModel\Starship');
    }
}
