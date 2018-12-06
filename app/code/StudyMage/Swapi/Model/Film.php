<?php

namespace StudyMage\Swapi\Model;

class Film extends \Magento\Framework\Model\AbstractModel implements \StudyMage\Swapi\Api\Data\FilmInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'swapi_film';

    protected function _construct()
    {
        $this->_init('StudyMage\Swapi\Model\ResourceModel\Film');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
