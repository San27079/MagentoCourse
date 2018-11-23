<?php
/**
 * Created by PhpStorm.
 * User: San27079
 * Date: 22.11.2018
 * Time: 0:31
 */

namespace StudyMage\Swapi\Helper;


interface SwapiDataInterface
{
    public function getCollection();
    public function getObject($id);
}