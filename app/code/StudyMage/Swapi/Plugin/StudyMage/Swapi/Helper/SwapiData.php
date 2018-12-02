<?php

namespace StudyMage\Swapi\Plugin\StudyMage\Swapi\Helper;

use Magento\Store\Model\StoreManagerInterface;
use StudyMage\Swapi\Helper\SwapiConfig;
use Magento\Framework\Event\Manager;
use StudyMage\Swapi\Model\DataTypesModel;

class SwapiData
{
    protected $storeManager;
    protected $swapiConfig;
    protected $dataTypes;

    public function __construct
    (
        StoreManagerInterface $storeManager,
        SwapiConfig $swapiConfig,
        Manager $eventManager,
        DataTypesModel $dataTypes
    )
    {
        $this->dataTypes = $dataTypes;
        $this->eventManager = $eventManager;
        $this->swapiConfig = $swapiConfig;
        $this->storeManager = $storeManager;
    }
    //function beforeMETHOD($subject, $arg1, $arg2){}
    //function aroundMETHOD($subject, $proceed, $arg1, $arg2){return $proceed($arg1, $arg2);}


    public function afterGetObject($subject, $result)
    {
        if(!empty($subject->props)){
            $filter_result = [];
            foreach($subject->props as $prop){
                if(isset($result->$prop)){
                    $filter_result[$prop] = $result->$prop;
                }
            }
            return (object) $filter_result;
        }
        return $result;
    }

    /**
     * @param $subject
     * @return mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function beforeGetCollection($subject)
    {
        $store_id = $this->storeManager->getStore()->getId();
        $data_types = $this->dataTypes->toOptionArray();
        if($store_id != 1){
            if(isset($data_types[$store_id])){
                $subject->setAddress($this->swapiConfig->getUrlValue('swapi_url_field', $store_id), $data_types[$store_id]['value']);
                // We can use observer if $address protected -> public
                /*$this->eventManager->dispatch(
                    'set_data_type_for_swapi',
                    [
                        'swapi' => &$subject,
                        'type_value' => $data_types[$store_id]['value'],
                        'api' => $this->swapiConfig->getUrlValue('swapi_url_field', $store_id)
                    ]
                );*/
            }
        }
        return $subject;
    }

    /**
     * @param $subject
     * @param $result
     * @return array
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function afterGetCollection($subject, $result)
    {
        if(!$this->swapiConfig->getEnableValue('swapi_enable_field', $this->storeManager->getStore()->getId())){
            return ['Sorry swapi module disable in this store view'];
        }
        return $result;
    }
}
