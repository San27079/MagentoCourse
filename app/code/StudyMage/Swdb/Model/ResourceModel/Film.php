<?php
namespace StudyMage\Swdb\Model\ResourceModel;
class Film extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('swdb_film','film_id');
    }
}
