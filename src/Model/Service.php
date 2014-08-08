<?php

namespace Fruitware\Samo\Models;

/**
 * type=service
 * Class Service
 * @package Fruitware\Samo\Models
 */
class Service extends CommonNameAbstract implements CommonInterface
{
    /**
     * Type of service
     * @return int
     */
    public function getServiceTypeId()
    {
        return $this->checkNumber($this->_node['servtype']);
    }
}
