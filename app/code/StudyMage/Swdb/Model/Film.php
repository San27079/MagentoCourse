<?php

namespace StudyMage\Swdb\Model;

class Film extends \Magento\Framework\Model\AbstractModel implements \StudyMage\Swdb\Api\Data\FilmInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'swdb_film';

    protected function _construct()
    {
        $this->_init('StudyMage\Swdb\Model\ResourceModel\Film');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
