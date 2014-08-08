<?php

namespace Fruitware\Samo\Models;

/**
 * type=currency
 * Class Currency
 * @package Fruitware\Samo\Models
 */
class Currency extends CommonNameAbstract implements CommonInterface
{
    /**
     * alias
     * @return string
     */
    public function getShortName() {
        return (string)$this->_node['alias'];
    }
}