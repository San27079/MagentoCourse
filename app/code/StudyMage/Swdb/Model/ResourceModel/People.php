<?php
namespace StudyMage\Swdb\Model\ResourceModel;
class People extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('swdb_people','people_id');
    }
}
