<?php
namespace StudyMage\Swdb\Api;

use StudyMage\Swdb\Api\Data\StarshipInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface StarshipRepositoryInterface 
{
    public function save(StarshipInterface $page);

    public function getById($id);

    public function getList(SearchCriteriaInterface $criteria);

    public function delete(StarshipInterface $page);

    public function deleteById($id);
}
