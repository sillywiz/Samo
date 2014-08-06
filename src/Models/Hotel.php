<?php

namespace Fruitware\Samo\Models;

/**
 * type=hotel
 * Class Hotel
 * @package Fruitware\Samo\Models
 */
class Hotel extends CommonName {

    /**
     * ID of star
     * @return int
     */
    public function getStarID() {
        return (int)$this->_node['star'];
    }

    /**
     * IF of town
     * @return int
     */
    public function getTownID() {
        return (int)$this->_node['town'];
    }
}