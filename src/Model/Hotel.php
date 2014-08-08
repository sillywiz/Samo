<?php

namespace Fruitware\Samo\Model;

/**
 * type=hotel
 * Class Hotel
 * @package Fruitware\Samo\Model
 */
class Hotel extends CommonNameAbstract implements CommonInterface
{
    /**
     * ID of star
     * @return int
     */
    public function getStarID()
    {
        return $this->checkNumber($this->_node['star']);
    }

    /**
     * IF of town
     * @return int
     */
    public function getTownID()
    {
        return $this->checkNumber($this->_node['town']);
    }
}
