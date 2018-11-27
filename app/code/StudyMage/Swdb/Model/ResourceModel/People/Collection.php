<?php
namespace StudyMage\Swdb\Model\ResourceModel\People;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('StudyMage\Swdb\Model\People','StudyMage\Swdb\Model\ResourceModel\People');
    }
}
