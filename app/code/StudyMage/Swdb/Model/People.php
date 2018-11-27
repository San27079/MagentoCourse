<?php
namespace StudyMage\Swdb\Model;
class People extends \Magento\Framework\Model\AbstractModel implements \StudyMage\Swdb\Api\Data\PeopleInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'studymage_swdb_people';

    protected function _construct()
    {
        $this->_init('StudyMage\Swdb\Model\ResourceModel\People');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
