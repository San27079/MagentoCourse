<?php
/**
 * Created by PhpStorm.
 * User: Sano
 * Date: 02.12.2018
 * Time: 18:48
 */

namespace StudyMage\Swapi\Model;

use \Magento\Framework\Option\ArrayInterface;

class DataTypesModel implements ArrayInterface
{
    /** Return types of data for swapi
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ["value" => "films", "label" => "Films"],
            ["value" => "people", "label" => "People"],
            ["value" => "planets", "label" => "Planets"],
            ["value" => "species", "label" => "Species"],
            ["value" => "starships", "label" => "Starships"],
            ["value" => "vehicles", "label" => "Vehicles"]
        ];
    }
}