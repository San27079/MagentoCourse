<?php
/**
 * Created by PhpStorm.
 * User: Sano
 * Date: 02.12.2018
 * Time: 19:08
 */

namespace StudyMage\Swapi\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class SwapiConfig extends AbstractHelper
{
    const CONFIG_SWAPI = "swapi_section/";

    /**
     * @param $field
     * @param null $store
     * @return mixed
     */
    protected function getValueFromConfig($field, $store = null)
    {
        return $this->scopeConfig->getValue(self::CONFIG_SWAPI . $field, ScopeInterface::SCOPE_STORE, $store);
    }

    /**
     * @param string $field
     * @param null $store
     * @return mixed
     */
    public function getUrlValue($field = 'swapi_url_field', $store = null)
    {
        return $this->getValueFromConfig('swapi_url' . '/' . $field, $store);
    }

    /**
     * @param string $field
     * @param null $store
     * @return mixed
     */
    public function getEnableValue($field = 'swapi_enable_field', $store = null)
    {
        return $this->getValueFromConfig('swapi_enable' . '/' . $field, $store);
    }

    /**
     * @param string $field
     * @param null $store
     * @return mixed
     */
    public function getObjectValue($field = 'swapi_types_field', $store = null)
    {
        return $this->getValueFromConfig('swapi_types' . '/' . $field, $store);
    }
}