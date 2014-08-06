<?php

namespace Fruitware\Samo\Models;

/**
 * type=town
 * Class Town
 * @package Fruitware\Samo\Models
 */
class Town extends CommonName {

    /**
     * ID of state
     * @return int
     */
    public function getStateID() {
        return (int)$this->_node['state'];
    }

    /**
     * ID of region
     * @return int
     */
    public function getRegionID() {
        return (int)$this->_node['region'];
    }
}