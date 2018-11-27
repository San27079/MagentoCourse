<?php
namespace StudyMage\Swdb\Model\ResourceModel\Film;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('StudyMage\Swdb\Model\Film','StudyMage\Swdb\Model\ResourceModel\Film');
    }
}
