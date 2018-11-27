<?php
namespace StudyMage\Swdb\Model;
class Starship extends \Magento\Framework\Model\AbstractModel implements \StudyMage\Swdb\Api\Data\StarshipInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'studymage_swdb_starship';

    protected function _construct()
    {
        $this->_init('StudyMage\Swdb\Model\ResourceModel\Starship');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
