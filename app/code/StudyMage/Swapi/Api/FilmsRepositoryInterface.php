<?php
namespace StudyMage\Swapi\Api;

use StudyMage\Swapi\Api\Data\FilmsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface FilmsRepositoryInterface 
{
    public function save(FilmsInterface $page);

    public function getById($id);

    public function getList(SearchCriteriaInterface $criteria);

    public function delete(FilmsInterface $page);

    public function deleteById($id);
}
