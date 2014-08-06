<?php

namespace Fruitware\Samo\Models;

/**
 * type=servtype
 * Class ServiceType
 * @package Fruitware\Samo\Models
 */
class ServiceType extends CommonName {

    public function getServiceTypeId() {
        return $this->checkNumber($this->_node['htplace']);
    }
}