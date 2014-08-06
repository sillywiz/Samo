<?php

namespace Fruitware\Samo\Models;

/**
 * type=region
 * Class Region
 * @package Fruitware\Samo\Models
 */
class Region extends CommonName {

    /**
     * ID of state
     * @return int
     */
    public function getStateID() {
        return (int)$this->_node['state'];
    }

}