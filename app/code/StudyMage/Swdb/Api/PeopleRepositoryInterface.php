<?php
namespace StudyMage\Swdb\Api;

use StudyMage\Swdb\Api\Data\PeopleInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface PeopleRepositoryInterface 
{
    public function save(PeopleInterface $page);

    public function getById($id);

    public function getList(SearchCriteriaInterface $criteria);

    public function delete(PeopleInterface $page);

    public function deleteById($id);
}
