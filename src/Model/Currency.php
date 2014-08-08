<?php

namespace Fruitware\Samo\Model;

/**
 * type=currency
 * Class Currency
 * @package Fruitware\Samo\Model
 */
class Currency extends CommonNameAbstract implements CommonInterface
{
    /**
     * alias
     * @return string
     */
    public function getShortName()
    {
        return (string) $this->_node['alias'];
    }
}
