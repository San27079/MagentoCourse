<?php
namespace StudyMage\Swapi\Ui\Component\Listing\DataProviders\Studymage\Swapi\Film;

class Grid extends \Magento\Ui\DataProvider\AbstractDataProvider
{    
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \StudyMage\Swapi\Model\ResourceModel\Film\CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }
}
