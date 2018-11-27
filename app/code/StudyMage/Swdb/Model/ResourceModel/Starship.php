<?php
namespace StudyMage\Swdb\Model\ResourceModel;
class Starship extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('swdb_starship','starship_id');
    }
}
