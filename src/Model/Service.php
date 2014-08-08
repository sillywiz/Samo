<?php

namespace Fruitware\Samo\Model;

/**
 * type=service
 * Class Service
 * @package Fruitware\Samo\Model
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
