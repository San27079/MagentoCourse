<?php
/**
 * Created by PhpStorm.
 * User: Sano
 * Date: 02.12.2018
 * Time: 21:21
 */

namespace StudyMage\Swapi\Model;

use Magento\Framework\Event\Observer;
use \Magento\Framework\Event\ObserverInterface;

class SwapiObserver implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $swapi = $observer->getData('swapi');
        $swapi->address = $observer->getData('api').$observer->getData('type_value').'/';
        return $this;
    }

}