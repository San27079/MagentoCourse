<?php
/**
 * Created by PhpStorm.
 * User: San27079
 * Date: 21.11.2018
 * Time: 22:48
 */

namespace StudyMage\Swapi\Helper;

use StudyMage\Swapi\Helper\SwapiDataInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\HTTP\Client\Curl;

class SwapiData extends AbstractHelper implements SwapiDataInterface
{
    public $props;
    protected $curl;
    protected $address;

    /**
     * SwapiData constructor.
     * @param Context $context
     * @param Curl $curl
     * @param string $type
     * @param array $props
     */
    public function __construct(
        Context $context,
        Curl $curl,
        $api = 'https://swapi.co/api/',
        $type = 'films',
        array $props = []
    )
    {
        $this->setAddress($api, $type);
        $this->props = $props;
        $this->curl = $curl;
        parent::__construct($context);
    }

    /**
     * @param $api
     * @param $type
     */
    public function setAddress($api, $type)
    {
        $this->address = "{$api}{$type}/";
    }
    /**
     * @return mixed
     */
    public function getCollection()
    {
        return $this->getDataFromApi($this->address)->results;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getObject($id)
    {
        return $this->getDataFromApi($this->address."{$id}/");
    }

    /**
     * @param $url
     * @return mixed
     */
    protected function getDataFromApi($url)
    {
        $this->curl->get($url);
        $this->errorHandler();
        return json_decode($this->curl->getBody(), false);
    }

    /**
     * @return void
     */
    protected function errorHandler()
    {
        $status = $this->curl->getStatus();
        if($status !== 200){
            exit("Requested object not found");
        };
    }

}