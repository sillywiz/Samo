<?php

namespace Fruitware\Samo\Models;

/**
 * type=service
 * Class Service
 * @package Fruitware\Samo\Models
 */
class Service extends CommonName {

    /**
     * Type of service
     * @return int
     */
    public function getServiceTypeId() {
        return $this->checkNumber($this->_node['servtype']);
    }
}